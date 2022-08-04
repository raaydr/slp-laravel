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
use App\Models\Absensi;
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
use Redirect;
use DataTables;
use DateTime;
use Carbon\Carbon;



class LaporanController extends Controller
{
    public function PembuatanLaporan(Request $request)
    {
        $title = 'Pembuatan Laporan Tugas';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data = Laporan::where('gen', $gen)->where('status', 1)->orderBy('created_at', 'ASC')->get();
            if($request->ajax()){
    
                return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $detail = route('admin.DetailLaporan', $row->id);
                        $id = $row->id;
                        $b = '
                        <a class="btn btn-primary btn-sm" href='.$detail.'>
                        <i class="fas fa-folder"></i>detail</a>';
                        $actionBtn = $b.' 
                            <a id="hapus" data-toggle="modal" data-target="#modal-danger" class="btn btn-danger btn-sm">Hapus</a></dl>
                                                            <div class="modal fade" id="modal-danger">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Penolakan</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">    
                                                                                <p>Apa anda yakin ingin menghapus Laporan Tugas ini ?</p>
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
                    })->rawColumns(['action'])
                    ->make(true);
            }
        
        return view('admin.pembuatanLaporan');
    }

    public function AddLaporan(Request $request){
        $validator = Validator::make($request->all(), 
        [   
            'judul' => 'required|string|max:255',
            'date' => 'required|date',
            'time_start' => 'required',
            'time_end' => 'required',
            'tipe_kegiatan' => 'required|string',
            'tempat' => 'required',
            'guest' => 'required',
            
            
            

        ],

        $messages = 
        [
            'judul.required' => 'Judul tidak boleh kosong!',
            'date.required' => 'tanggal kegiatan tidak boleh kosong !',
            'tipe_kegiatan.required' => 'Tipe Kegiatan tugas tidak boleh kosong',
            'time_start.required' => 'Isi jam dimulai acara tidak boleh kosong',
            'time_end.required' => 'Isi jam berakhir acara tidak boleh kosong',
            
            'guest.required' => 'Pengisi atau Gueststar tidak boleh kosong!',
            'tempat.required' => 'Tempat tidak boleh kosong!',
            
            


        ]);     

        if($validator->fails())
        {
            return response()->json(['status'=>0, 'msg'=>'periksa input','error'=>$validator->errors()->all()]);
        }
    
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        //Laporan
        $laporan = new Laporan;
        $laporan->judul = $request->judul;
        $laporan->tanggal_kegiatan = $request->date;
        $laporan->tipe_kegiatan = $request->tipe_kegiatan;
        $laporan->gen = $gen;
        $laporan->time_start = $request->time_start;
        $laporan->time_end = $request->time_end;
        $laporan->guest = $request->guest;
        $laporan->tempat = $request->tempat;
        $laporan->status = 1;
        $laporan->save();

        //Absensi

        $peserta = User::where('level', 1)->orWhere('level', 4)->get();
        $jumlah_peserta = count($peserta);
        for ($i = 0; $i <= $jumlah_peserta - 1; $i++) {
            
            $level = $peserta[$i]['level'];
            $id = $peserta[$i]['id'];
            $absensi = new Absensi;
            if(($level)== 1){
                $nama = DB::table('biodata')
                        ->where('user_id', $id)
                        ->value('nama');
                $absensi->nama = $nama;
                
                
            }else{
                $nama = Peserta::where('user_id', $id)->value('nama');
                $grup = Peserta::where('user_id', $id)->value('grup');
                
                $absensi->nama = $nama;
                $absensi->grup = $grup;
            }
            $absensi->absen = 0;
            $absensi->laporan_id = $laporan->id;
            $absensi->user_id = $id;
            $absensi->save();
        }
        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
    }
    public function DeleteLaporan($id)
    {
        Laporan::where('id', $id)->update([
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        return response()->json(['success'=>'Hapus Laporan ']);
        
    }

    public function DetailLaporan($id)
    {
        $title = 'Detail Laporan ';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $genMax = Laporan::where('status', 1)
            ->max('gen');
        $Laporan = Laporan::where('id', $id)->first();

        if(($gen == $Laporan->gen)&&($genMax == $Laporan->gen)){
            $boolean = 1;
        }else{
            $boolean = 0;
        }
        $tanggal_mulai = $Laporan->mulai;
        $tanggal_mulai=Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y');
        return view('admin.detailLaporanTugas', compact('title', 'gen','Laporan','tanggal_mulai','boolean'));
    }

    public function EditLaporan(Request $request, $id){
        $validator = Validator::make($request->all(), 
        [   
            'judul' => 'nullable|string|regex:/^[\w ]+$/|max:255',
            'jumlah' => 'nullable|integer',
            'gen' => 'nullable|integer',
            'keterangan' => 'nullable',
            'mulai' => 'nullable',
            
            
            
            

        ],

        $messages = 
        [
            
            'judul.string' => 'Tolong isi dengan benar',
            'judul.regex' => 'Tolong isi hanya dengan alphabet dan angka',
         


        ]);     

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();    
        }
            $id = $request->id;
            $LaporanLama = Laporan::where('id', $id)->first();
            $judul_new = $request->judul;
            $jumlah_new = $request->jumlah;
            $gen_new = $request->gen;
            $mulai_new = $request->mulai;
            
    
            if($judul_new == NULL){
                $judul_new = $LaporanLama->judul;    
            }
            if($jumlah_new == NULL){
                $jumlah_new = $LaporanLama->jumlah;    
            }
            if($gen_new == NULL){
                $gen_new = $LaporanLama->gen;    
            }
            if($mulai_new == NULL){
                $mulai_new = $LaporanLama->mulai;
                    
            }
            $mulai_new=Carbon::parse($mulai_new)->format('Y/m/d');
            $detail=$request->keterangan;
            if (!empty($detail)){
                $dom = new \DomDocument();
                $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $detail = $dom->saveHTML();
                $keterangan_new = $detail;
            } else{
                $keterangan_new = $LaporanLama->keterangan;  
            }
           
                Laporan::where('id', $id)->update([
                    'judul' => $judul_new,
                    'jumlah' => $jumlah_new,
                    'gen' => $gen_new,
                    'mulai' => $mulai_new,
                    'keterangan' => $keterangan_new,
                    'updated_at' => now(),
                    ]
                );
                
            
                return Redirect::back()->with('pesan','berhasil');
        
    }

}
