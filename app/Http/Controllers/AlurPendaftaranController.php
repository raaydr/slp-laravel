<?php

namespace App\Http\Controllers;


use App\Models\User;
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
use App\Models\Alur;
use Auth;
use PDF;
use Image;
use Redirect;
use DataTables;
use DateTime;
use Carbon\Carbon;



class AlurPendaftaranController extends Controller
{
    public function PembuatanAlurPendaftaran(Request $request)
    {
        $title = 'Pembuatan Alur Pendaftaran';
        if(Alur::where('status',1)->exists()){
            $max = Alur ::where('status',1)->max('urutan');
            for ($x = 1; $x < $max; $x++) {
                if (Alur::where('urutan',$x)->where('status',1)->doesntExist()) {
                    $urut = $x;
                    break;
                } else{
                    $max = $max + 1;
                }
            }
            
        }else{
            $urut = 1;
        }
        
        $data = Alur::where('status', 1)->orderBy('created_at', 'ASC')->get();
            if($request->ajax()){
    
                return datatables()->of($data)                    
                    ->addColumn('action', function($row){
                        $detail = route('admin.DetailLaporan', $row->id);
                        $id = $row->id;
                        $urutan = $row->urutan;
                        $judul = $row->judul;
                        $isi = $row->isi;
                        $b = '
                        <a class="btn btn-outline-primary m-1" data-toggle="modal" data-myid="'.$id.'" 
                        data-judul="'.$judul.'" data-urutan="'.$urutan.'" data-isi="'.$isi.'" 
                        data-target="#modal-edit"  target="_blank">
                        edit</a>
                        ';
                        $actionBtn = $b.'  
                            <button data-toggle="modal" data-target="#modal-delete'.$id.'"  data-myid='.$id.' class="btn btn-outline-danger m-1">Hapus</button></dl>
                                                            <div class="modal fade" id="modal-delete'.$id.'">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Konfirmasi</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">    
                                                                                <p>Apa anda yakin ingin menghapus  '.$judul.' ?</p>
                                                                                <div class="modal-footer justify-content-between">
                                                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-urutan="'.$urutan.'" data-dismiss="modal" data-original-title="Delete" class="btn btn-outline-light deleteItem">Delete</a>
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
        
        return view('admin.pembuatanAlurPendaftaran',compact ('urut'));
    }
    public function AddAlurPendaftaran(Request $request){
        $validator = Validator::make($request->all(), 
        [   
            'judul' => 'required|string|max:255',
            'urutan' => 'required',
            'isi' => 'required',
            
            
            

        ],

        $messages = 
        [
            'judul.required' => 'Judul tidak boleh kosong!',
            'urutan.required' => 'urutan tidak boleh kosong !',
            'isi.required' => 'Tolong diisi, tidak boleh kosong',
            
            'urutan.numeric' => 'Urutan haru berupa angka',
            
            
            


        ]);     

        if($validator->fails())
        {
            return response()->json(['status'=>0, 'msg'=>'periksa input','error'=>$validator->errors()->all()]);
        }
    

        $alur = new Alur;
        $alur->judul = $request->judul;
        $alur->urutan = $request->urutan;
        $alur->isi = $request->isi;
        $alur->status = 1;
        $alur->save();

        //Absensi

        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
    }

    public function DeleteAlur($id)
    {
        
        Alur::where('id', $id)->update([
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        //return response()->json(['success'=>'Hapus Alur Pendaftaran ']);
        return redirect()->route('admin.PembuatanAlurPendaftaran');
        
    }

    public function EditAlur(Request $request){
       
        $alur = array();
        
        if($request->judul != null){
            $judul = $request->judul;
            $alur['judul'] = $judul;
        }
       
        if($request->isi != null){
            $isi = $request->isi;
            $alur['isi'] = $isi;
        }

        
        $alur['updated_at'] = now();

        Alur::where('id', $request->id )->update($alur);

        return response()->json(['status'=>1,'success'=>'Edit saved successfully.']);
        
    }
}
