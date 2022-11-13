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
use App\Models\Jadwal;
use App\Models\Benefit;
use App\Models\Persyaratan;
use App\Models\Interview;
use App\Models\Challenge;
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
                ->addColumn('Tanggal', function($row){
                    $tanggal = $row->mulai;
                    $tanggal = Carbon::parse($tanggal)->isoFormat('D MMMM Y');

                    return $tanggal;
                })                   
                    ->addColumn('action', function($row){
                        $id = $row->id;
                        $urutan = $row->urutan;
                        $judul = $row->judul;
                        $isi = $row->isi;
                        $mulai = $row->mulai;
                        $b = '
                        <a class="btn btn-outline-primary m-1" data-toggle="modal" data-myid="'.$id.'" 
                        data-judul="'.$judul.'" data-urutan="'.$urutan.'" data-isi="'.$isi.'"data-mulai="'.$mulai.'" 
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
            'mulai' => 'required|date',
            
            

        ],

        $messages = 
        [
            'judul.required' => 'Judul tidak boleh kosong!',
            'urutan.required' => 'urutan tidak boleh kosong !',
            'isi.required' => 'Tolong diisi, tidak boleh kosong',
            'mulai.required' => 'Tanggal tidak boleh kosong!',
            'urutan.numeric' => 'Urutan haru berupa angka',
            
            
            


        ]);     

        if($validator->fails())
        {
            return response()->json(['status'=>0, 'msg'=>'periksa input','error'=>$validator->errors()->all()]);
        }
    

        $alur = new Alur;
        $alur->judul = $request->judul;
        $alur->mulai = $request->mulai;
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

        if($request->mulai != null){
            $mulai = $request->mulai;
            $alur['mulai'] = $mulai;
        }

        
        $alur['updated_at'] = now();

        Alur::where('id', $request->id )->update($alur);

        return response()->json(['status'=>1,'success'=>'Edit saved successfully.']);
        
    }

    public function pembuatanBenefitPersyaratan(Request $request)
    {
        
        
        return view('admin.pembuatanBenefitPersyaratan');
    }

    public function tabelBenefit(Request $request)
    {
        
        $data = Benefit::where('status', 1)->orderBy('created_at', 'ASC')->get();
            if($request->ajax()){
    
                return datatables()->of($data)                    
                    ->addColumn('action', function($row){
                        $id = $row->id;
                        $benefit = $row->manfaat;
                        $b = '
                        <a class="btn btn-outline-primary m-1" data-toggle="modal" data-myid="'.$id.'" 
                        data-manfaat="'.$benefit.'"  
                        data-target="#modal-edit-benefit"  target="_blank">
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
                                                                                <p>Apa anda yakin ingin menghapus benefit ini ?</p>
                                                                                <div class="modal-footer justify-content-between">
                                                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-dismiss="modal" data-original-title="Delete" class="btn btn-outline-light deleteBenefit">Delete</a>
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
    }

    public function AddBenefit(Request $request){
        $validator = Validator::make($request->all(), 
        [   
            'manfaat' => 'required|string',
            
            
            
            

        ],

        $messages = 
        [
            'manfaat.required' => 'Manfaat tidak boleh kosong!',
            
            
            
            


        ]);     

        if($validator->fails())
        {
            return response()->json(['status'=>0, 'msg'=>'periksa input','error'=>$validator->errors()->all()]);
        }
    

        $benefit = new Benefit;
        $benefit->manfaat = $request->manfaat;
        $benefit->status = 1;
        $benefit->save();

        //Absensi

        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
    }

    public function DeleteBenefit($id)
    {
        
        Benefit::where('id', $id)->update([
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        return response()->json(['success'=>'Hapus Benefit']);
        
        
    }

    public function EditBenefit(Request $request){
       
        $benefit = array();
        
        if($request->manfaat != null){
            $manfaat = $request->manfaat;
            $alur['manfaat'] = $manfaat;
        }
       
      

        
        $benefit['updated_at'] = now();

        Benefit::where('id', $request->id )->update([
            'manfaat' => $request->manfaat,
            'updated_at' => now(),
            ]
        );
        

        return response()->json(['status'=>1,'success'=>'Edit saved successfully.']);
        
    }

    public function tabelPersyaratan(Request $request)
    {
        
        $data = Persyaratan::where('status', 1)->orderBy('created_at', 'ASC')->get();
            if($request->ajax()){
    
                return datatables()->of($data)                    
                    ->addColumn('action', function($row){
                        $id = $row->id;
                        $syarat = $row->syarat;
                        $b = '
                        <a class="btn btn-outline-primary m-1" data-toggle="modal" data-myid="'.$id.'" 
                        data-syarat="'.$syarat.'"  
                        data-target="#modal-edit-persyaratan"  target="_blank">
                        edit</a>
                        ';
                        $actionBtn = $b.'  
                            <button data-toggle="modal" data-target="#modal-deletes'.$id.'"  data-myid='.$id.' class="btn btn-outline-danger m-1">Hapus</button></dl>
                                                            <div class="modal fade" id="modal-deletes'.$id.'">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Konfirmasi</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">    
                                                                                <p>Apa anda yakin ingin menghapus persyaratan ini ?</p>
                                                                                <div class="modal-footer justify-content-between">
                                                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-dismiss="modal" data-original-title="Delete" class="btn btn-outline-light deletePersyaratan">Delete</a>
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
    }

    public function AddPersyaratan(Request $request){
        $validator = Validator::make($request->all(), 
        [   
            'syarat' => 'required|string',
            
            
            
            

        ],

        $messages = 
        [
            'syarat.required' => 'Manfaat tidak boleh kosong!',
            
            
            
            


        ]);     

        if($validator->fails())
        {
            return response()->json(['status'=>0, 'msg'=>'periksa input','error'=>$validator->errors()->all()]);
        }
    

        $persyaratan = new Persyaratan;
        $persyaratan->syarat = $request->syarat;
        $persyaratan->status = 1;
        $persyaratan->save();

        //Absensi

        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
    }


        public function DeletePersyaratan($id)
    {
        
        Persyaratan::where('id', $id)->update([
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        return response()->json(['success'=>'Hapus Persyaratan']);
        
        
    }

    public function EditPersyaratan(Request $request){

        Persyaratan::where('id', $request->id )->update([
            'syarat' => $request->syarat,
            'updated_at' => now(),
            ]
        );
        

        return response()->json(['status'=>1,'success'=>'Edit saved successfully.']);
        
    }

    public function tabelJadwal(Request $request)
    {
        
        $data = Jadwal::where('status', 1)->orderBy('awal', 'desc')->get();
            if($request->ajax()){
    
                return datatables()->of($data)
                ->addColumn('Antrian', function($row){
                    $awal = $row->awal;
                    $akhir = $row->akhir;

                    $antrian= $awal.'  s.d. '.$akhir;

                    return $antrian;
                })
                ->addColumn('Jam', function($row){
                    $awal = $row->time_start;
                    $akhir = $row->time_end;

                    $antrian= $awal.'  s.d. '.$akhir;

                    return $antrian;
                })
                ->addColumn('Tanggal', function($row){
                    $tanggal = $row->tanggal;
                    $tanggal = Carbon::parse($tanggal)->isoFormat('D MMMM Y');

                    return $tanggal;
                })                    
                    ->addColumn('action', function($row){
                        $id = $row->id;
                        $awal = $row->awal;
                        $akhir = $row->akhir;
                        $tanggal = $row->tanggal;
                        $tanggal = Carbon::parse($tanggal)->isoFormat('YYYY-MM-DD');
                        $time_start = $row->time_start;
                        $time_end = $row->time_end;
                        $b = '
                        <a class="btn btn-outline-primary m-1" data-toggle="modal" data-myid="'.$id.'" 
                        data-awal="'.$awal.'"  
                        data-akhir="'.$akhir.'"  
                        data-tanggal="'.$tanggal.'"  
                        data-time_start="'.$time_start.'"  
                        data-time_end="'.$time_end.'"  
                        data-target="#modal-edit-jadwal"  target="_blank">
                        edit</a>
                        ';
                        $actionBtn = $b.'  
                            <button data-toggle="modal" data-target="#modal-deletes'.$id.'"  data-myid='.$id.' class="btn btn-outline-danger m-1">Hapus</button></dl>
                                                            <div class="modal fade" id="modal-deletes'.$id.'">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Konfirmasi</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">    
                                                                                <p>Apa anda yakin ingin menghapus jadwal ini ?</p>
                                                                                <div class="modal-footer justify-content-between">
                                                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-dismiss="modal" data-original-title="Delete" class="btn btn-outline-light deleteJadwal">Delete</a>
                                                                                </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->';
                        return $actionBtn;
                    })->rawColumns(['Antrian','Jam','Tanggal','action'])
                    ->make(true);
            }
    }

    public function AddInterview(Request $request){
        $validator = Validator::make($request->all(), 
        [   
         
            
            
            
            

        ],

        $messages = 
        [
            
            
            
            
            


        ]);     

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();    
        }
    
        $lokasi=$request->lokasi;
        $dom = new \DomDocument();
        $dom->loadHtml($lokasi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $lokasi = $dom->saveHTML();

        $psikotes = $request->psikotes;
        $dom1 = new \DomDocument();
        $dom1->loadHtml($psikotes, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $psikotes = $dom1->saveHTML();

        $interview = new Interview;
        $interview->lokasi = $lokasi;
        $interview->psikotes = $psikotes;
        $interview->status = 1;

        if ((Interview::where('id', 1))->exists()){
            
            Interview::where('id', 1 )->update([
                'lokasi' => $lokasi,
                'psikotes' => $psikotes,
                'updated_at' => now(),
                ]
            );
        }else{
            $interview->save();
        }

        
        

        //Absensi

        return redirect()->route('admin.control')->with('berhasil', 'Ubah Lokasi dan Psikotes');
    }

    public function AddJadwal(Request $request){
        $validator = Validator::make($request->all(), 
        [   
            'awal' => 'required',
            'akhir' => 'required',
            'tanggal' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',

            
            
            

        ],

        $messages = 
        [
          
            'awal.required' => 'Antrian awal tidak boleh kosong!',
            'akhir.required' => 'Antrian akhir tidak boleh kosong !',
            'tanggal.required' => 'Jadwal tidak boleh kosong',
            'time_start.required' => 'Isi jam dimulai acara tidak boleh kosong',
            'time_end.required' => 'Isi jam berakhir acara tidak boleh kosong',
            
            
            


        ]);     

        if($validator->fails())
        {
            return response()->json(['status'=>0, 'msg'=>'periksa input','error'=>$validator->errors()->all()]);
        }
    
        $data = Jadwal::where('status', 1)->orderBy('awal', 'ASC')->get();
        $jumlah_data = count($data);
        $min = $request->awal;
        $max = $request->akhir;

            for ($i = 0; $i <= $jumlah_data-1; $i++) {
                $awal = $data[$i]['awal'];
                $akhir = $data[$i]['akhir'];

                if (($awal <= $min) && ($min <= $akhir)){
                    $break = 0;
                    break;
                }else{
                    $break = 1;
                }                
            }
        
        $jadwal = New Jadwal;
        $jadwal->awal = $request->awal;
        $jadwal->akhir = $request->akhir;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->time_start = $request->time_start;
        $jadwal->time_end = $request->time_end;
        $jadwal->status = 1;

        if($break == 0){
            return response()->json(['status'=>2,'warning'=>'jadwal antrian sudah ada']);
        }else{
            $jadwal->save();

            return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
        }
        
    }

    public function DeleteJadwal($id)
    {
        
        Jadwal::where('id', $id)->update([
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        return response()->json(['success'=>'Hapus Jadwal']);
        
        
    }

    public function EditJadwal(Request $request){

        $data = Jadwal::where('status', 1)->orderBy('awal', 'ASC')->get();
        $jumlah_data = count($data);
        $min = $request->awal;
        $max = $request->akhir;

            for ($i = 0; $i <= $jumlah_data-1; $i++) {
                $awal = $data[$i]['awal'];
                $akhir = $data[$i]['akhir'];
                $id = $data[$i]['id'];

                if($id == $request->id){
                    $break = 1;
                }else{
                    if (($awal <= $min) && ($min <= $akhir)){
                        $break = 0;
                        break;
                    }else{
                        $break = 1;
                    }              
                }
                  
            }

        $jadwal = array();
        
        if($request->awal != null){
            $jadwal['awal'] = $request->awal;
        }
        if($request->akhir != null){
            $jadwal['akhir'] = $request->akhir;
        }
        if($request->tanggal != null){
            $jadwal['tanggal'] = $request->tanggal;
        }
        if($request->time_start != null){
            $jadwal['time_start'] = $request->time_start;
        }
        if($request->time_end != null){
            $jadwal['time_end'] = $request->time_end;
        }
        $jadwal['updated_at'] = now();

        if($break == 0){
            return response()->json(['status'=>2,'warning'=>'jadwal antrian sudah ada']);
        }else{
            Jadwal::where('id', $request->id )->update($jadwal);


            return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
        }
    }

    public function tabelChallenge(Request $request)
    {
        $title = 'Pembuatan Rule Challenge';
        $data = Challenge::where('status', 1)->orderBy('created_at', 'ASC')->get();
            if($request->ajax()){
    
                return datatables()->of($data)
                ->addColumn('Rule', function($row){
                    $id = $row->awal;
                    $isi = $row->rule;
                    $judul = $row->judul;

                    return $isi;
                })                    
                    ->addColumn('action', function($row){
                        $id = $row->id;
                        
                        $judul = $row->judul;
                        $rule = $row->rule;
                        //$rule=json_decode($rule);
                        $b = '
                        <a class="btn btn-outline-primary m-1" data-toggle="modal" data-myid="'.$id.'" 
                        data-judul="'.$judul.'"  data-rule="'.$rule.'" 
                        data-target="#modal-edit-challenge"  target="_blank">
                        edit</a>
                        ';
                        $actionBtn = $b.'  
                            <button data-toggle="modal" data-target="#modal-deleted'.$id.'"  data-myid='.$id.' class="btn btn-outline-danger m-1">Hapus</button></dl>
                                                            <div class="modal fade" id="modal-deleted'.$id.'">
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
                                                                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'"  data-dismiss="modal" data-original-title="Delete" class="btn btn-outline-light deleteChallenge">Delete</a>
                                                                                </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->';
                        return $actionBtn;
                    })->rawColumns(['Rule','action'])
                    ->make(true);
            }
    }
    public function AddRuleChallenge(Request $request){
        $validator = Validator::make($request->all(), 
        [   
            'judul' => 'required|string|max:255',
            'rule' => 'required',
            
            
            

        ],

        $messages = 
        [
            'judul.required' => 'Judul tidak boleh kosong!',
            'rule.required' => 'Tolong diisi, tidak boleh kosong',
            
            
            
            
            


        ]);     

        if($validator->fails())
        {
            return response()->json(['status'=>0, 'msg'=>'periksa input','error'=>$validator->errors()->all()]);
        }
    

        $rule = new Challenge;
        $rule->judul = $request->judul;
        $isi = $request->rule;
        $pattern = '/"/i';
        $isi= preg_replace($pattern, '-', $isi);
        //$dom = new \DomDocument();
        //$dom->loadHtml($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        //$isi = $dom->saveHTML();
        $rule->rule = $isi;

        $rule->status = 1;
        $rule->save();

        //Absensi

        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
    }

    public function DeleteChallenge($id)
    {
        
        Challenge::where('id', $id)->update([
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        return response()->json(['success'=>'Hapus challenge ']);
        
        
    }

    public function EditChallenge(Request $request){
       
        $rule = array();
        
        if($request->judul != null){
            $judul = $request->judul;
            $rule['judul'] = $judul;
        }
       
        if($request->rule != null){
            
            $isi = $request->rule;
            $pattern = '/"/i';
            $isi= preg_replace($pattern, '-', $isi);
            $rule['rule'] = $isi;
        }

        
        $rule['updated_at'] = now();

        Challenge::where('id', $request->id )->update($rule);

        return response()->json(['status'=>1,'success'=>'Edit saved successfully.']);
        
    }
}
