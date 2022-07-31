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
use App\Models\Quest;
use App\Models\Target;
use App\Models\Writing;
use App\Models\Speaking;
use App\Models\Jualan;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Input;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use DateTime;
use Carbon\Carbon;
use Redirect;

class TugasController extends Controller
{
    public function addTugasWriting (Request $request, $id){
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required|string',
                'kelompok_writing' => 'nullable|string|max:255',
                'keterangan' => 'required',
                'url_link' => 'nullable',
                'url_file' => 'mimes:doc,pdf,docx,zip,pdf|max:10240',
                
                
            ],

            $messages = [
                'judul.required' => 'judul tidak boleh kosong!',
                'keterangan.required' => 'awalan tidak boleh kosong!',
                
                
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $user_id = Auth::user()->id;

        $tugas = new Writing;
        $tugas->judul = $request->judul;
        $tugas->kelompok_writing = $request->kelompok_writing;
        $detail=$request->keterangan;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();
        $tugas->keterangan = $detail;
        $tugas->user_id = $user_id;
        $tugas->target_tugasID = $id;
        $tugas->target_tugas = Target::where('id', $id)->value('judul');
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        $tugas->gen = $gen;
        $tugas->valid = 0 ;
        if($request->hasFile('url_file')) 
            {
            
            $file = $request->file('url_file') ;
            $namaFile = $request->judul;
            $current = $tugas->id;
            $namaFile = $namaFile.'_'.time().'.'.$file->getClientOriginalExtension() ;
            $fileName = preg_replace("/\s+/", "", $namaFile);
            $destinationPath = public_path().'/writing/' ;
            $file->move($destinationPath,$fileName);
            $tugas->writing = $fileName ;
        }else{
            $tugas->writing = $request->url_link;
            
        }
        
        
        $tugas->save();
        
       return Redirect::back()->with('pesan','Pengisian Tugas Berhasil');

        
    }

    public function validasiTugas()
    {
        $title = 'List Pendaftar ';
        
        return view('admin.validasiTugas');
    }

    public function tabelTugasWriting(Request $request)
    {
        
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data = DB::table('peserta')
        ->where('peserta.gen', $gen)
        ->join('tugas_writing', 'tugas_writing.user_id', '=', 'peserta.user_id')
        ->where('valid', 0)->orWhere('valid', 1)->orderBy('tugas_writing.id', 'ASC')->get();
        if($request->ajax()){

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('Grup', function($row){
                    $check = $row->grup;
                    if(($check)== '0'){
                        return '<p class="text-danger">Kosong</p>';
                    }
                    if(($check)== '1'){
                        return '<p class="text-primary"><b>Grup 1</b></p>';
                    }
                    if(($check)== '2'){
                        return '<p class="text-success"><b>Grup 2</b></p>';
                    }
                    if(($check)== '3'){
                        return '<p class="text-warning"><b>Grup 3</b></p>';
                    }
                    return 'test';
                })
                ->addColumn('Status', function($row){
                    $status = $row->valid;
                    switch ($status) {
                        case '0':
                            return '<p class="text-warning"><b>Belum Diperiksa</b></p>';
                            break;
                        case '1':
                            return '<p class="text-success"><b>Valid</b></p>';
                            break;
                        case '2':
                            return '<p class="text-danger"><b>Invalid</b></p>';
                            break;                               
                            default:
                            echo "SLP INDONESIA";
                            break;
                    }
                })
                ->addColumn('action', function($row){
                    $detail = route('admin.detailTugasWriting', Crypt::encrypt($row->id));
                    
                    $actionBtn = '
                    <a class="btn btn-primary btn-sm" href='.$detail.'>
                    <i class="fas fa-folder"></i>Detail</a>';
                    return $actionBtn;
                })->rawColumns(['Status','Grup', 'action'])
                ->make(true);
        }
        
    }
    public function detailTugasWriting($id)
    {
        $title = 'Detail Tugas Writing ';
        $id = Crypt::decrypt($id);
        $tugas = Writing::where('id', $id)->first();
        $target =Target::where('id',$tugas->target_tugasID)->first();
        $peserta =Peserta::where('user_id',$tugas->user_id)->first();
        $asset= "/writing/";
        $url= $tugas->writing;
        $file= $asset . $url;
        if (file_exists(public_path($file))) {
            $boolean = 1;
          } 
        elseif($url == "kosong"){
            $boolean = 2;
        }
        else{
            $boolean = 0;
        }
            
        $tanggal_mulai = $target->mulai;
        $tanggal_mulai=Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y');
        $level = Auth::user()->level;
        switch ($level) {
            case '0':
                //admin
                return view('admin.detailTugasWriting',compact('title','tugas','target','boolean','tanggal_mulai','peserta'));
                break;
            case '4':
                //peserta
                return view('admin.detailTugasWriting',compact('title','tugas','target','boolean'));
                break;   
            case '5':
                //fasil
                return view('admin.detailTugasWriting',compact('title','tugas','target','boolean'));
                break;   
                default:
                echo "SLP INDONESIA";
                break;
        }
        
        
    }

    public function noteTugas (Request $request,$tugas_id,$target_id)
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
        
        $tugas_id = Crypt::decrypt($tugas_id);
        $level = Auth::user()->level;        
        $tipe_tugas = Target::where('id', $target_id)->value('tipe_tugas');


        switch ($tipe_tugas) {
            case 'Creative Writing':
                Writing::where('id',$tugas_id)->update([
                
                    'note' => $request->note,
                    'updated_at'=> now(),
                ]);
                break;
            case 'Public Speaking':
                Speaking::where('id',$tugas_id)->update([
                
                    'note' => $request->note,
                    'updated_at'=> now(),
                ]);
                break;
                default:
                echo "SLP INDONESIA";
                break;
        }
            return Redirect::back()->with('pesan','berhasil');
    

    }
    public function checkTugas ($tugas_id,$target_id,$val)
    {
        
        $tugas_id = Crypt::decrypt($tugas_id);
        $id = Auth::user()->id;        
        $tipe_tugas = Target::where('id', $target_id)->value('tipe_tugas');
        
        switch ($tipe_tugas) {
            case 'Creative Writing':
                
                if($val == 2){
                    $file = Writing::where('id', $tugas_id)->value('writing');
                    File::delete('writing/' . $file);
                    Writing::where('id',$tugas_id)->update([
                        'writing' => "kosong",
                        'valid' => $val,
                        'check_id' => $id,
                        'updated_at'=> now(),
                    ]);
                } else {
                    Writing::where('id',$tugas_id)->update([    
                        'valid' => $val,
                        'check_id' => $id,
                        'updated_at'=> now(),
                    ]);
                }
                
                
                break;
           case 'Public Speaking':
            if($val == 2){
                $file = Speaking::where('id', $tugas_id)->value('speaking');
                $data = json_decode($file);
                
                foreach($data as $image)
                {
                    File::delete('speaking/' . $image);
                }
                Speaking::where('id',$tugas_id)->update([
                    'speaking' => "kosong",
                    'valid' => $val,
                    'check_id' => $id,
                    'updated_at'=> now(),
                ]);
            } else {
                Speaking::where('id',$tugas_id)->update([    
                    'valid' => $val,
                    'check_id' => $id,
                    'updated_at'=> now(),
                ]);
            }
            
                break;
                default:
                echo "SLP INDONESIA";
                break;
        }
            return Redirect::back()->with('pesan','berhasil');
    

    }
    
    public function addTugasSpeaking (Request $request, $id){
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required|string',
                'jumlah_peserta' => 'nullable|string|max:255',
                'keterangan' => 'required',
                'url_link' => 'nullable',
                'url_file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
                
                
            ],

            $messages = [
                'judul.required' => 'judul tidak boleh kosong!',
                'keterangan.required' => 'awalan tidak boleh kosong!',
                
                
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
       
        $user_id = Auth::user()->id;

        $tugas = new Speaking;
        $tugas->judul = $request->judul;
        $tugas->jumlah_peserta = $request->jumlah_peserta;
        $detail=$request->keterangan;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();
        $tugas->keterangan = $detail;
        $tugas->user_id = $user_id;
        $tugas->target_tugasID = $id;
        $tugas->target_tugas = Target::where('id', $id)->value('judul');
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        $tugas->gen = $gen;
        $tugas->valid = 0 ;
        if($request->hasFile('url_file')) 
            {

            $count = 1;
            foreach($request->file('url_file') as $image)
            {
              

                $namaFile = $request->judul;
                $namaFile = $namaFile.$count.'_'.time().'.'.$image->getClientOriginalExtension() ;
                $fileName = preg_replace("/\s+/", "", $namaFile);
                $destinationPath = public_path().'/speaking/' ;
                $image->move($destinationPath,$fileName);
                $data[] = $fileName;
                $count++;  
            }
                $tugas->speaking =json_encode($data);
            }else{
                $tugas->speaking = $request->url_link;
                
            }
        
        
        $tugas->save();
        
       return Redirect::back()->with('pesan','Pengisian Tugas Berhasil');

        
        
    }

    public function tabelTugasSpeaking(Request $request)
    {
        
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data = DB::table('peserta')
        ->where('peserta.gen', $gen)
        ->join('tugas_speaking', 'tugas_speaking.user_id', '=', 'peserta.user_id')
        ->where('valid', 0)->orWhere('valid', 1)->orderBy('tugas_speaking.id', 'ASC')->get();
        if($request->ajax()){

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('Grup', function($row){
                    $check = $row->grup;
                    if(($check)== '0'){
                        return '<p class="text-danger">Kosong</p>';
                    }
                    if(($check)== '1'){
                        return '<p class="text-primary"><b>Grup 1</b></p>';
                    }
                    if(($check)== '2'){
                        return '<p class="text-success"><b>Grup 2</b></p>';
                    }
                    if(($check)== '3'){
                        return '<p class="text-warning"><b>Grup 3</b></p>';
                    }
                    return 'test';
                })
                ->addColumn('Status', function($row){
                    $status = $row->valid;
                    switch ($status) {
                        case '0':
                            return '<p class="text-warning"><b>Belum Diperiksa</b></p>';
                            break;
                        case '1':
                            return '<p class="text-success"><b>Valid</b></p>';
                            break;
                        case '2':
                            return '<p class="text-danger"><b>Invalid</b></p>';
                            break;                               
                            default:
                            echo "SLP INDONESIA";
                            break;
                    }
                })
                ->addColumn('action', function($row){
                    $detail = route('admin.detailTugasSpeaking', Crypt::encrypt($row->id));
                    
                    $actionBtn = '
                    <a class="btn btn-primary btn-sm" href='.$detail.'>
                    <i class="fas fa-folder"></i>Detail</a>';
                    return $actionBtn;
                })->rawColumns(['Status','Grup', 'action'])
                ->make(true);
        }
        
    }

    public function detailTugasSpeaking($id)
    {
        $title = 'Detail Tugas Speaking ';
        $id = Crypt::decrypt($id);
        $tugas = Speaking::where('id', $id)->first();
        $target =Target::where('id',$tugas->target_tugasID)->first();
        $peserta =Peserta::where('user_id',$tugas->user_id)->first();
        if($tugas->speaking == "kosong"){
            $boolean = 2;
        }else{
            $regex = '/\\[[^\\]]*]/i';
            $boolean = preg_match($regex, $tugas->speaking);
        }
        
        $tanggal_mulai = $target->mulai;
        $tanggal_mulai=Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y');
        $level = Auth::user()->level;
        switch ($level) {
            case '0':
                //admin
                return view('admin.detailTugasSpeaking',compact('title','tugas','target','boolean','tanggal_mulai','peserta'));
                break;
            case '4':
                //peserta
                return view('admin.detailTugasWriting',compact('title','tugas','target','boolean'));
                break;   
            case '5':
                //fasil
                return view('admin.detailTugasWriting',compact('title','tugas','target','boolean'));
                break;   
                default:
                echo "SLP INDONESIA";
                break;
        }
        
        
    }
    public function testTabel1(Request $request)
    {
        
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data =   $data = User::join('biodata', 'biodata.user_id', '=', 'users.id')
        ->where('level', 4)->orderBy('users.id', 'ASC')->get();
        if($request->ajax()){

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('Umur', function($row){
                    $bd = $row->tanggal_lahir;
                    $date = new DateTime($bd);
                    $now = new DateTime();
                    $interval = $now->diff($date);
                    $umur= $interval->y;
                    return $umur;
                    

                })
                ->addColumn('Seleksi Berkas', function($row){
                    $ajaib = $row->seleksi_berkas;
                    if (($ajaib)== 'LULUS'){
                        
                        return '<p class="text-success">LULUS</p>';    
                    }else{
                        
                        return '<p class="text-danger">GAGAL</p>';  
                    }
                    
                    
                    
                })
                ->addColumn('Seleksi Challenge', function($row){
                    $ajaib = $row->seleksi_pertama;
                    if (($ajaib)== 'LOLOS'){
                        
                        return '<p class="text-success">LOLOS</p>';    
                    }else{
                        
                        return '<p class="text-danger">GUGUR</p>';  
                    }
                    
                    
                    
                })
                ->addColumn('Seleksi Interview', function($row){
                    $ajaib = $row->seleksi_kedua;
                    if (($ajaib)== 'BERHASIL'){
                        
                        return '<p class="text-success">BERHASIL</p>';    
                    }else{
                        
                        return '<p class="text-danger">TERELIMINASI</p>';  
                    }
                    
                    
                    
                })
                ->addColumn('action', function($row){
                    $detail = route('admin.userprofile', $row->user_id);
                    $actionBtn = '
                    <a class="btn btn-primary btn-sm" href='.$detail.'>
                    <i class="fas fa-folder"></i>Detail</a>';
                    return $actionBtn;
                })->rawColumns(['Umur','Seleksi Berkas','Seleksi Challenge','Seleksi Interview', 'action'])
                ->make(true);
        }
        
    }
    public function testTabel(Request $request)
    {
        
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data =   $data = User::join('biodata', 'biodata.user_id', '=', 'users.id')
        ->where('level', 2)->orderBy('users.id', 'ASC')->get();
        if($request->ajax()){

            return datatables()->of($data)
            ->addIndexColumn()
                ->addColumn('Umur', function($row){
                    $bd = $row->tanggal_lahir;
                    $date = new DateTime($bd);
                    $now = new DateTime();
                    $interval = $now->diff($date);
                    $umur= $interval->y;
                    return $umur;
                    

                })
                ->addColumn('Seleksi Berkas', function($row){
                    $ajaib = $row->seleksi_berkas;
                    if (($ajaib)== 'LULUS'){
                        
                        return '<p class="text-success">LULUS</p>';    
                    }else{
                        
                        return '<p class="text-danger">GAGAL</p>';  
                    }
                    
                    
                    
                })
                ->addColumn('Seleksi Challenge', function($row){
                    $ajaib = $row->seleksi_pertama;
                    if (($ajaib)== 'LOLOS'){
                        
                        return '<p class="text-success">LOLOS</p>';    
                    }else{
                        
                        return '<p class="text-danger">GUGUR</p>';  
                    }
                    
                    
                    
                })
                ->addColumn('Seleksi Interview', function($row){
                    $ajaib = $row->seleksi_kedua;
                    if (($ajaib)== 'BERHASIL'){
                        
                        return '<p class="text-success">BERHASIL</p>';    
                    }else{
                        
                        return '<p class="text-danger">TERELIMINASI</p>';  
                    }
                    
                    
                    
                })
                ->addColumn('action', function($row){
                    $detail = route('admin.userprofile', $row->user_id);
                    $actionBtn = '
                    <a class="btn btn-primary btn-sm" href='.$detail.'>
                    <i class="fas fa-folder"></i>Detail</a>';
                    return $actionBtn;
                })->rawColumns(['Umur','Seleksi Berkas','Seleksi Challenge','Seleksi Interview', 'action'])
                ->make(true);
        }
    }
    
    
    public function testbtn(){
        return Redirect::back()->with('pesan','berhasil');
    }
}