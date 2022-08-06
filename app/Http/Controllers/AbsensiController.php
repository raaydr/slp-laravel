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



class AbsensiController extends Controller
{
    public function DetailAbsensi(Request $request, $id)
    {
        $title = 'Absensi Kegiatan';
        $laporan = Laporan::where('id', $id)->first();
        $tanggal_mulai = $laporan->tanggal_kegiatan;
        $tanggal_mulai=Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y');
        $mulai=date_format($laporan->time_start, 'G:i');
        $akhir=date_format($laporan->time_end, 'G:i');
        
        
        
        return view('admin.DetailAbsensi', compact('laporan','tanggal_mulai','mulai','akhir'));
        
    }
    
    public function TabelAbsensi (Request $request, $id){
        $data = Absensi::where('laporan_id', $id)->get();
            if($request->ajax()){
    
                return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('Grup', function($row){
                        $grup = $row->grup;
                        if($grup == NULL){
                            return '<p class="text">Kosong</p>';
                        }else{
                            return $grup;
                        }
                    })
                    ->addColumn('Kehadiran', function($row){
                        $kehadiran = $row->absen;
                        switch ($kehadiran) {
                            case '0':
                                return '<p class="text-warning">Belum Hadir</p>';
                                break;
                            case '1':
                                return '<p class="text-primary">Hadir</p>';
                                break;   
                            case '2':
                                return '<p class="text-danger">Tidak Hadir</p>';
                                break;   
                                default:
                                echo "SLP INDONESIA";
                                break;
                        }
                    })
                    ->addColumn('action', function($row){
                        $kehadiran = $row->absen;
                        $id = $row->id;
                        $actionBtn = '
                        <button class="btn btn-primary btn-sm m-1" data-toggle="modal" data-myid='.$id.' data-target="#modal-note"  target="_blank">
                                       <i class="fas fa-info"> </i>
                                       Note
                                       </button>
                                       ';
                        $detail = route('admin.userprofile', $row->user_id);
                                       $actionBtn =$actionBtn. '
                                        <a class="btn btn-primary btn-sm m-2" href='.$detail.' target="_blank">
                                           <i class="fas fa-folder"> </i>
                                           Detail
                                           </a>';
                        switch ($kehadiran) {
                            case '0':
                                $actionBtn = $actionBtn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-val="2" data-original-title="Publish" class="btn btn-danger btn-sm m-2 deleteItem">Absen</a>';
                                $actionBtn = $actionBtn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-val="1" data-original-title="Publish" class="btn btn-success btn-sm m-2 deleteItem">Hadir</a>';
                                
                                return $actionBtn;
                                break;
                            case '1':
                                $actionBtn = $actionBtn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-val="2" data-original-title="Publish" class="btn btn-danger btn-sm m-2 deleteItem">Absen</a>';
                                return $actionBtn;
                                break;   
                            case '2':
                                $actionBtn = $actionBtn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-val="1" data-original-title="Publish" class="btn btn-success btn-sm m-2 deleteItem">Hadir</a>';
                                return $actionBtn;
                                break;   
                                default:
                                echo "SLP INDONESIA";
                                break;
                        }
                    })->rawColumns(['Grup','Kehadiran','action'])
                    ->make(true);
            }
    }

    public function checkAbsensi($id,$val)
    {
        switch ($val) {
            case '1':
                Absensi::where('id', $id)->update([
                    'absen' => 1,
                    'updated_at' => now(),
                    ]
                );            
                return response()->json(['success'=>'Absensi untuk kehadiran']);
                break;
            case '2':
                Absensi::where('id', $id)->update([
                    'absen' => 2,
                    'updated_at' => now(),
                    ]
                );            
                return response()->json(['success'=>'Absensi untuk ketidakhadiran']);
                break;
            
                default:
                echo "SLP INDONESIA";
                break;
        }    
    }
    public function noteAbsensi (Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'note' => 'required',
                

                

            ],

            $messages = [
                
                'note.required' => 'tolong dilengkapi',
                
               

            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        
            Absensi::where('id',$request->id)->update([
            
                'note' => $request->note,
                'updated_at'=> now(),
            ]);
            
    
            return response()->json(['success'=>'Berhasil menambahkan keterangan absensi']);
    }

}
