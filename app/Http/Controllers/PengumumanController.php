<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Biodata;
use App\Models\seleksiPertama;
use App\Models\Penilaian;
use App\Models\Control;
use App\Models\Antrian;
use App\Models\Peserta;
use App\Models\Fasil;
use App\Models\Blog;
use App\Models\FasilRecord;
use App\Models\Quest;
use App\Models\Target;
use App\Models\Laporan;
use App\Models\Dokumentasi;
use App\Models\DokumentasiPembayaran;
use App\Models\Absensi;
use App\Models\Pengumuman;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Input;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Auth;
use PDF;
use Redirect;
use DataTables;
use DateTime;
use Carbon\Carbon;



class PengumumanController extends Controller
{
    public function PembuatanPengumuman(Request $request)
    {
        $title = 'Pembuatan Pengumuman';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data = Pengumuman::where('gen', $gen)->where('status', 1)->orderBy('created_at', 'ASC')->get();
            if($request->ajax()){
    
                return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('Penerima', function($row){
                        $check = $row->level;
                        switch ($check) {
                            case '1':
                                return '<p class="text-success"><b>Pendaftar</b></p>';
                                break;
                            case '4':
                                return '<p class="text-primary"><b>Peserta</b></p>';
                                break;                               
                                default:
                                echo "SLP INDONESIA";
                                break;
                        }
                    })
                    ->addColumn('action', function($row){
                        $detail = route('admin.DetailLaporan', $row->id);
                        $id = $row->id;
                        $isi = $row->isi;
                        $note = $row->note;
                        $b = ' 
                        <a data-toggle="modal" data-target="#modal-detail" class="btn btn-outline-primary m-2">Detail</a></dl>
                                                        <div class="modal fade" id="modal-detail">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content ">
                                                                    <div class="modal-header bg-info">
                                                                        <h4 class="modal-title">Pengumuman</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">    
                                                                            <p><?php
                                                                            echo '.$isi.' </p>
                                                                            <div class="modal-footer justify-content-between">
                                                                            <h6>Pesan Admin : '.$note.' </h6>
                                                                            </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->';
                        $actionBtn = $b.' 
                            <a id="hapus" data-toggle="modal" data-target="#modal-danger" class="btn btn-danger btn-sm">Hapus</a></dl>
                                                            <div class="modal fade" id="modal-danger">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Pemberitahuan</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">    
                                                                                <p>Apa anda yakin ingin menghapus Pengumuman ini ?</p>
                                                                                <div class="modal-footer justify-content-between">
                                                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-dismiss="modal" data-original-title="Delete" class="btn btn-outline-light deleteItem">Delete</a>
                                                                                </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->';
                        return $actionBtn;
                    })->rawColumns(['Penerima','action'])
                    ->make(true);
            }
        
        return view('admin.pembuatanPengumuman');
    }

    public function DeletePengumuman($id)
    {
        Pengumuman::where('id', $id)->update([
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        return response()->json(['success'=>'Hapus Pengumuman ']);
        
    }

    public function AddPengumuman(Request $request){
        $validator = Validator::make($request->all(), 
        [   
            'judul' => 'required|string|max:255',
            'date' => 'required|date',
            'level' => 'required',
            'keterangan' => 'required',
            
            
            
            

        ],

        $messages = 
        [
            'judul.required' => 'Judul tidak boleh kosong!',
            'date.required' => 'tanggal tidak boleh kosong !',
            
            
            


        ]);     

        if($validator->fails())
        {
            return response()->json(['status'=>0, 'msg'=>'periksa input','error'=>$validator->errors()->all()]);
        }
    
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        //Laporan
        $pengumuman = new Pengumuman;
        $pengumuman->judul = $request->judul;
        $pengumuman->level = $request->level;
        $pengumuman->note = $request->note;
        $pengumuman->tanggal_diumumkan = $request->date;
        $pengumuman->gen = $gen;
        $pengumuman->status = 1;
        $detail=$request->keterangan;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();
        $pengumuman->isi = $detail;
        

        $pengumuman->save();



        
        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
    }

    public function Pengumuman()
    {
        $id = Auth::user()->id;
        $level= Auth::user()->level;
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        $data = Pengumuman::where('gen', $gen)->where('level', $level)
        ->where('status', 1)->whereDate('tanggal_diumumkan', '<=', Carbon::today())->orderBy('tanggal_diumumkan', 'DESC')->get();
        $jumlah_data = count($data);
                for ($i = 0; $i <= $jumlah_data-1; $i++) {
                    $tanggal_mulai = $data[$i]['tanggal_diumumkan'];
                    $tanggal_mulai=Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y');
                    $data[$i]['tanggal_diumumkan']= $tanggal_mulai;
    
                    
                }
        switch ($level) {
            case '1':
                
                return view('pendaftar.pengumuman',compact('data'));
                break;
            case '4':
                
                return view('peserta.pengumuman',compact('data'));
                break;                               
                default:
                echo "SLP INDONESIA";
                break;
        }
        
    }
}
