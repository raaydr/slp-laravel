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
use App\Models\Interview;
use App\Models\Laporan;
use App\Models\Absensi;
use App\Models\Dokumentasi;
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
use PDF;

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

// VIEW 
    public function control()
    {
        $title = 'control Admin';
        $pendaftaran = DB::table('control')
            ->where('id', 1)
            ->get();
        $quest = DB::table('control')
            ->where('id', 2)
            ->get();
        $seleksiPertama = DB::table('control')
            ->where('id', 3)
            ->get();
        $gen = DB::table('control')
            ->where('id', 4)
            ->get();
        $interview = DB::table('control')
            ->where('id', 5)
            ->get();
        $antrian = Antrian::where('gen', 2)->max('antrian');            
        if(Interview::where('id', 1)->exists()){
            $wawancara = Interview::where('id', 1)->first();
        }else{
            $wawancara = new Interview;
            $wawancara->lokasi = "kosong";
            $wawancara->psikotes = "kosong";
        }
        

        return view('admin.control', compact('title', 'pendaftaran', 'quest', 'seleksiPertama', 'gen', 'interview','wawancara'
    ,'antrian'));
    }
    public function view_create_controller()
    {
        $title = 'Admin create controller';
        
        

        return view('admin.createController', compact('title'));
    }
    public function informasiPendaftar()
    {
        $title = 'List Pendaftar ';
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        $users = User::where('gen', $gen)->whereBetween('level', [1,2])->get();
        $jumlah=count($users);

        $Pria = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('jenis_kelamin', 'Pria')->get();
        $Pria=count($Pria);

        $Wanita = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('jenis_kelamin', 'Wanita')->get();
        $Wanita=count($Wanita);

        $domJak = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('domisili', 'Jakarta')->get();
        $domJak=count($domJak);

        $domBog = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('domisili', 'Bogor')->get();
        $domBog=count($domBog);

        $domDep = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('domisili', 'Depok')->get();
        $domDep=count($domDep);

        $domTang = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('domisili', 'Tangerang')->get();
        $domTang=count($domTang);

        $domBek = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('domisili', 'Bekasi')->get();
        $domBek=count($domBek);

        $domLain = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('domisili', 'Lainnya')->get();
        $domLain=count($domLain);

        $mahasiswa = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('aktivitas', 'Mahasiswa')->get();
        $mahasiswa=count($mahasiswa);

        $karyawan = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('aktivitas', 'Karyawan')->get();
        $karyawan=count($karyawan);

        $pengusaha = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('aktivitas', 'Pengusaha')->get();
        $pengusaha=count($pengusaha);

        $pelajar = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('aktivitas', 'Pelajar')->get();
        $pelajar=count($pelajar);

        $lainnya = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('aktivitas', 'Yang lain')->get();
        $lainnya=count($lainnya);

        

        $writing = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('minatprogram', 'Creative Writing')->get();
        $writing=count($writing);

        $speaking = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('minatprogram', 'Public Speaking')->get();
        $speaking=count($speaking);

        $berkas = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('seleksi_berkas', 'LULUS')->get();
        $berkas=count($berkas);

        $pertama = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('seleksi_pertama', 'LOLOS')->get();
        $pertama=count($pertama);

        $kedua = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->whereBetween('level', [1,2])->where('seleksi_kedua', 'BERHASIL')->get();
        $kedua=count($kedua);
    
        $old =0;
        $child=0;
        $dewasa=0;
        for ($i = 0; $i <= $jumlah-1; $i++) {
            $user_id = $users[$i]['id'];
            $biodata = Biodata::where('user_id', $user_id)->first();

            $bd = $biodata->tanggal_lahir;
            $date = new DateTime($bd);
            $now = new DateTime();
            $interval = $now->diff($date);
            $umur= $interval->y;
            
            $gender = $biodata->jenis_kelamin;
                if($umur < 17){
                    $child++;
                }else if($umur>22){
                    $old++;
                }else{
                    $dewasa++;
                }
             
            }
        $informasi = array("pendaftar"=>$jumlah,"Pria"=>$Pria, "Wanita"=>$Wanita,
        "child"=>$child,"old"=>$old,"dewasa"=>$dewasa,
        "domJak"=>$domJak,"domBog"=>$domBog,"domDep"=>$domDep,"domTang"=>$domTang,
        "domBek"=>$domBek,"domLain"=>$domLain,
        "mahasiswa"=>$mahasiswa,"karyawan"=>$karyawan,"pengusaha"=>$pengusaha,"pelajar"=>$pelajar,"lainnya"=>$lainnya,
        "writing"=>$writing,"speaking"=>$speaking,
        "berkas"=>$berkas,"pertama"=>$pertama,"kedua"=>$kedua,);
        //return dd($informasi);
        return view('admin.informasiPendaftar', compact('title', 'users','informasi'));
    }
    public function listPendaftar(Request $request)
    {
        $title = 'List Pendaftar ';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
        ->where('level', 1)->orderBy('users.id', 'ASC')->get();
        if($request->ajax()){

            return datatables()->of($data)
                
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
                    switch ($ajaib) {
                        case "LULUS":
                            //admin
                            return '<p class="text-success">LULUS</p>';    
                            break;
                        case "GAGAL":
                            //peserta
                            return '<p class="text-danger">GAGAL</p>';
                            break;   
                        case NULL:
                            //fasil
                            return '<p class="text-danger">KOSONG</p>';
                            break;   
                            default:
                            echo "SLP INDONESIA";
                            break;
                    } 
                    
                    
                    
                })
                ->addColumn('Seleksi Challenge', function($row){
                    $ajaib = $row->seleksi_pertama;
                    switch ($ajaib) {
                        case "LOLOS":
                            //admin
                            return '<p class="text-success">LOLOS</p>';     
                            break;
                        case "GUGUR":
                            //peserta
                            return '<p class="text-danger">GUGUR</p>';  
                            break;   
                        case NULL:
                            //fasil
                            return '<p class="text-danger">KOSONG</p>';
                            break;   
                            default:
                            echo "SLP INDONESIA";
                            break;
                    }                    
                })
                ->addColumn('Seleksi Interview', function($row){
                    $ajaib = $row->seleksi_kedua;
                    switch ($ajaib) {
                        case "BERHASIL":
                            //admin
                            return '<p class="text-success">BERHASIL</p>';     
                            break;
                        case "TERELIMINASI":
                            //peserta
                            return '<p class="text-danger">TERELIMINASI</p>';  
                            break;   
                        case NULL:
                            //fasil
                            return '<p class="text-danger">KOSONG</p>';
                            break;   
                            default:
                            echo "SLP INDONESIA";
                            break;
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
        return view('admin.listPendaftar');
    }
    public function antrian_interview()
    {  
        $title = 'Antrian Interview';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        //$antrian = Antrian::where('gen', $gen)->orderBy('antrian', 'ASC')->get();
        $antrian = DB::table('antrian_interview')
                    ->join('table_kepribadian', 'table_kepribadian.user_id', '=', 'antrian_interview.user_id')
                    ->where('gen', $gen)->orderBy('antrian', 'ASC')->get();

        return view('admin.antrian', compact('title', 'antrian'));
    }

    public function seleksi1(Request $request)
    {
        $title = 'Seleksi Pertama Admin';
        $biodata = Biodata::all();
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        $data = User::where('gen',$gen)->join('biodata', 'biodata.user_id', '=', 'users.id')
                    ->where('level', 2)->get();
        if($request->ajax()){

            return datatables()->of($data)
                ->addIndexColumn()
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
                    $ajaib = $row->seleksi_pertama;
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
                })->rawColumns(['Seleksi Berkas','Seleksi Challenge','Seleksi Interview', 'action'])
                ->make(true);
        }

        return view('admin.seleksi1');
    }
    public function seleksi2()
    {
        $title = 'Gagal Login';
        $seleksiPertama = seleksiPertama::all();
        $users = User::where('level', 3)->get();

        return view('admin.seleksi2', compact('title', 'users'));
    }
    public function userProfile($user_id)
    {
        $title = 'Admin User Profile';
        
        $user = User::where('id', $user_id)->first();
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        
        
        if ((Penilaian::where('user_id', $user_id))->exists()){
            $penjualan = Penilaian::where('user_id', $user_id)->value('penjualan');
            
        }else {
            $penjualan = 0;
        }
        
        $data = Laporan::where('status', 1)->where('gen', $gen)->orderBy('created_at', 'ASC')->get();
        $kegiatan =[];
        $jumlah_data = count($data);
    
            for ($i = 0; $i <= $jumlah_data-1; $i++) {                
                $laporan_id = $data[$i]['id'];
                $tanggal_kegiatan = $data[$i]['tanggal_kegiatan'];
                $tanggal_kegiatan=Carbon::parse($tanggal_kegiatan)->isoFormat('D MMMM Y');
                $kehadiran = Absensi::where('laporan_id', $laporan_id)->where('user_id', $user_id)->value('absen');
                switch ($kehadiran) {
                    case '0':
                        $laporan['absen'] = "Belum Hadir";
                        break;
                    case '1':
                        $laporan['absen'] = "Hadir";
                        break;
                    case '2':
                        $laporan['absen'] = "Tidak Hadir";
                        break;                               
                }
                $note = Absensi::where('laporan_id', $laporan_id)->where('user_id', $user_id)->value('note');
                $laporan['note'] = $note;
                $laporan['judul']=$data[$i]['judul'];
                $laporan['tanggal_kegiatan']=$tanggal_kegiatan;
                $kegiatan[$i] = $laporan;

                
            }

        
        return view('admin.userProfile', compact('title', 'user','penjualan','kegiatan'));
    }
    public function edit_biodata($user_id)
    {
        Biodata::where('user_id', $user_id )->update(['edit' => '1']);
        
        return Redirect::back()->with('pesan','Memberikan akses edit biodata');
    }

    public function editbiodata(Request $request)
    {
        $title = 'Ubah Biodata';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();

        return view('user.editbiodata', compact('title', 'user', 'biodata'));
    }
    public function challenge(){
        $title = 'Admin Seleksi Challenge';
        $challenge = seleksiPertama::where('checked', 0)->get();
        $jumlah=count($challenge);
        $penilaian = Penilaian::get();
        $r=0;
        

        return view('admin.seleksi3', compact('title', 'challenge', 'penilaian','r'));
    }
    public function rank_challenge(Request $request){
        $title = 'Admin Rank Challenge';
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        $data = DB::table('penilaian_challenge')->where('gen',$gen)
                    ->join('seleksiPertama', 'seleksiPertama.user_id', '=', 'penilaian_challenge.user_id')
                    ->join('biodata', 'biodata.user_id', '=', 'penilaian_challenge.user_id')
                    ->orderBy('total', 'DESC')->get();
        if($request->ajax()){
        $rank=0;
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('Penilaian', function($row){
                    $business = $row->business;
                    $video = $row->video;
                    $writing = $row->writing;
                    $point = $row->point;
                    $penjualan = $row->penjualan;
                    $id = $row->user_id;
                    
                        $actionBtn = '
                        <button class="btn btn-primary btn-sm m-1" data-toggle="modal" data-myid='.$id.' data-writing='.$writing.' data-point='.$point.' data-video='.$video.' data-penjualan='.$penjualan.' data-target="#modal-penilaian"  target="_blank">
                                       <i class="fas fa-info"> </i>
                                       Ubah Penilaian
                                       </button>
                                       ';
                        $actionBtn = $actionBtn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-val="0" data-original-title="Publish" class="btn btn-danger btn-sm m-2 deleteItem">Gugur</a>';
                        $actionBtn = $actionBtn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-val="1" data-original-title="Publish" class="btn btn-success btn-sm m-2 deleteItem">Lulus</a>';
                        $detail = route('admin.userprofile', $row->user_id);
                        $actionBtn =$actionBtn. '
                        <a class="btn btn-primary btn-sm m-2" href='.$detail.' >
                                           <i class="fas fa-folder"> </i>
                                           Detail
                                           </a>';
                        return $actionBtn;
                    

                })
                ->addColumn('Status', function($row){
                    $check = $row->seleksi_pertama;
                    if(($check)== 'GUGUR'){
                        return '<p class="text-danger">GUGUR</p>';
                    }
                    if(($check)== 'LOLOS'){
                        return '<p class="text-success">LOLOS</p>';
                    }
                    
                })
                ->addColumn('Challenge Writing', function($row){
                    $w = $row->url_writing;
                    if (($w)== '#'){

                        return '<p type="text-danger" >kosong</p>';    
                    }else{

                        return '<a type="text" href='.$w.' target="_blank">check</a>';  
                    }
                })->addColumn('Challenge Video', function($row){
                    $v = $row->url_video;
                    if (($v)== '#'){

                        return '<p type="text-danger" >kosong</p>';    
                    }else{

                        return '<a type="text" href='.$v.' target="_blank">check</a>';  
                    }
                })
                ->addColumn('Challenge Business', function($row){
                    $b = $row->url_Business;
                    $asset= "/imgPembelian/";
                    $link= $asset . $b;
                    if (($b)== '#'){

                        return '<p type="text-danger" >kosong</p>';    
                    }else{
                        //return $link;
                        return '<a type="text" href="'.$link.'" target="_blank">check</a>';  
                    }
                })
                ->rawColumns(['Penilaian','Status', 'Challenge Writing', 'Challenge Video', 'Challenge Business'])
                ->make(true);
        }

        return view('admin.seleksi4', compact('title', 'data'));
    }
    public function keputusanSeleksiPertama($user_id,$val)
    {
        
        switch ($val) {
            case '0':
                User::where('id', $user_id)->update(['level' => '2']);
                Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'GUGUR']);
                seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
                return response()->json(['success'=>'Batal Publish Mata Pelatihan']);
                break;
            case '1':
                User::where('id', $user_id)->update(['level' => '1']);
                Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'LOLOS']);
                seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
                return response()->json(['success'=>'Publish Mata Pelatihan']);
                break;
            
                default:
                echo "Kemenkes";
                break;
        }    
    }
    public function create_fasil(){
        $title = 'Admin Fasil';
        
        

        return view('admin.createfasil', compact('title'));
    }
    public function list_fasil(){
        $title = 'Admin List Fasil';
        $users = User::where('level', 5)->orderBy('id', 'ASC')->get();
        
        

        return view('admin.listfasil', compact('title','users'));
    }
    public function fasilProfile($user_id)
    {
        $title = 'Admin Fasil Profile';
        
        $user = User::where('id', $user_id)->first();
        
        

        return view('admin.fasilProfile', compact('title', 'user'));
    }
    public function ubah_password(){
        $title = 'Admin ubah password';
        
        

        return view('admin.ubahpassword', compact('title'));
    }

    public function pengelompok_peserta(Request $request){
        $title = 'Admin Peserta ';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data = DB::table('users')
                    ->join('biodata', 'biodata.user_id', '=', 'users.id')
                    ->join('peserta', 'peserta.user_id', '=', 'users.id')
                    //->join('peserta', 'peserta.user_id', '=', 'users.id')
                    ->where('users.gen', $gen)->where('users.level', 4)
                    ->get();
        
        
        if($request->ajax()){
                return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('Rapor', function($row){
                        $detail = route('admin.userprofile', $row->user_id);
                        $writing = route('admin.raporTugasWriting', $row->user_id);
                        $speaking = route('admin.raporTugasSpeaking', $row->user_id);
                        $entrepreneur = route('admin.raporTugasEntrepreneur', $row->user_id);
                        return '<a type="button"  href='.$writing.' class="btn btn-sm btn-outline-primary m-2 " target="_blank"><i class="fa fa-edit"></i>Writing</a>
                        <a type="button"  href='.$speaking.' class="btn btn-sm btn-outline-info m-2" target="_blank"><i class="fa fa-edit"></i>Speaking</a>
                        <a type="button"  href='.$entrepreneur.' class="btn btn-sm btn-outline-danger m-2" target="_blank"><i class="fa fa-edit"></i>Entrepreneur</a>
                        ';
                        
    
                    })
                    ->addColumn('Gender', function($row){
                        $check = $row->jenis_kelamin;
                        if(($check)== 'Pria'){
                            return '<p class="text-primary">Pria</p>';
                        }
                        if(($check)== 'Wanita'){
                            return '<p class="text-success">Wanita</p>';
                        }
                        
                    })
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
                    })->addColumn('Status', function($row){
                        $v = $row->aktif;
                        if (($v)== '0'){
    
                            return '<p class="text-danger">non-aktif</p>';    
                        }else{
    
                            return '<p class="text-success">aktif</p>';  
                        }
                        return 'test';
                    })
                    ->addColumn('action', function($row){
                    $check = $row->aktif;
                    $detail = route('admin.userprofile', $row->user_id);
                    $writing = route('admin.raporTugasWriting', $row->user_id);
                    $speaking = route('admin.raporTugasSpeaking', $row->user_id);
                    $entrepreneur = route('admin.raporTugasEntrepreneur', $row->user_id);
                    $id = $row->user_id;
                    $nama = $row->nama;
                    
                    switch ($check) {
                        case '0':
                            return '<button class="btn btn-success btn-sm m-2" data-toggle="modal" data-myid='.$id.' data-myname='.$nama.' data-target="#modal-grup" target="_blank">
                            <i class="fas fa-info"> </i>
                            grup
                            </button>
                            <a class="btn btn-primary btn-sm m-2"  href='.$detail.'>
                            <i class="fas fa-folder"> </i>
                            Detail
                            </a>
                            <a class="btn btn-primary btn-sm m-2 deleteItem" data-id="'.$id.'" >
                            <i class="fas ion-person"> </i>
                            Aktif
                            </a>
                            ';  
                                
                            break;
                        case '1':
                            return  '<button class="btn btn-success btn-sm m-2" data-toggle="modal" data-myid='.$id.' data-myname='.$nama.' data-target="#modal-grup" target="_blank">
                            <i class="fas fa-info"> </i>
                            grup
                            </button>
                            <a class="btn btn-primary btn-sm m-2"  href='.$detail.'>
                            <i class="fas fa-folder"> </i>
                            Detail
                            </a>                         
                            <a class="btn btn-danger btn-sm m-2 deleteItem" data-id="'.$id.'" >
                            <i class="fas ion-person"> </i>
                            Gugur
                            </a>
                            ';  
                            break;   
                            default:
                            echo "SLP INDONESIA";
                            break;
                    }
                    
                        
                    })
                    ->rawColumns(['Rapor','Gender', 'Grup', 'Status', 'action'])
                    ->make(true);
            }
        return view('admin.pengelompokPeserta', compact('title'));
    }
// Method LULUS GAGAL
    public function seleksi1_lulus($user_id)
    {
        $title = 'Admin User Profile';
        
        User::where('id', $user_id)->update(['level' => '1']);

        if ((seleksiPertama::where('user_id', $user_id))->exists()){
            Biodata::where('user_id', $user_id)->update(['seleksi_berkas' => 'LULUS']);
        }else{
            Biodata::where('user_id', $user_id)->update(['seleksi_berkas' => 'LULUS']);
            $users=User::find($user_id)->biodata;
            
            //Table seleksiPertama
            
            $seleksiPertama = new seleksiPertama;
            $seleksiPertama->user_id = $user_id;
            $seleksiPertama->url_cv = '#';
            $seleksiPertama->url_writing = '#';
            $seleksiPertama->url_video = '#';
            $seleksiPertama->url_Business = '#';
            $seleksiPertama->mentoring = 'Tolong diisi';
            $seleksiPertama->mentoring_rutin = 'Tolong diisi';
            $seleksiPertama->futur = 'Tolong diisi';
            $seleksiPertama->faith = 'Tolong diisi';
            $seleksiPertama->ethic = 'Tolong diisi';
            $seleksiPertama->question1 = 'Tolong diisi';
            $seleksiPertama->question2 = 'Tolong diisi';
            $seleksiPertama->question3 = 'Tolong diisi';
            $seleksiPertama->question4 = 'Tolong diisi';
            $seleksiPertama->organisasi = 'Belum pernah';
            $seleksiPertama->aktif_organisasi = 'Belum pernah';
            $seleksiPertama->question5 = 'Tolong diisi';
            $seleksiPertama->question6 = 'Tolong diisi';
            $seleksiPertama->question7 = 'Tolong diisi';
            $seleksiPertama->entrepreneurship = 'Tolong diisi';
            $seleksiPertama->alasan_wirausaha = 'Tolong diisi';
            $seleksiPertama->pernah_wirausaha = 'Belum pernah';
            $seleksiPertama->exp_wirausaha = 'Belum pernah';
            $seleksiPertama->omset = 'Tolong diisi';
            $seleksiPertama->nama = $users->nama;
            $seleksiPertama->checked = 0;
            $seleksiPertama->save();
        }
        
        return redirect()->route('admin.userprofile', [$user_id])->with('berhasil', 'berhasil meluluskan seleksi berkas');
        
    }

    public function seleksi1_gagal($user_id)
    {
        $title = 'Admin User Profile';
        
        User::where('id', $user_id)->update(['level' => '2']);
        Biodata::where('user_id', $user_id)->update(['seleksi_berkas' => 'GAGAL']);
        seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
        $users=User::find($user_id)->biodata;
        
        return redirect()->route('admin.userprofile', [$user_id])->with('berhasil', 'berhasil menggagalkan seleksi berkas');
        
    }

    public function seleksi2_lulus($user_id)
    {
        
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $penilaian = DB::table('penilaian_challenge')
            ->where('user_id', $user_id)
            ->value('id');
        if (!empty($penilaian)){
            User::where('id', $user_id)->update(['level' => '1']);
            Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'LOLOS']);
            $users=User::find($user_id)->biodata;
            $seleksiPertama=User::find($user_id)->seleksiPertama;
            $pdf=User::find($user_id)->userPDF;
            $antrian = DB::table('controller')
            ->where('id', 1)
            ->value('antrian');
            $antrian++;
            $antrian_interview = new Antrian;
            $antrian_interview->user_id = $user_id;
            $antrian_interview->nama = $users->nama;
            $antrian_interview->antrian = $antrian;
            $antrian_interview->absen = "Tidak Hadir";
            $antrian_interview->gen = $gen;
            $antrian_interview->save();
            DB::table('controller')->where('id',1)->update([            
                'antrian'=> $antrian,
                'updated_at'=> now(),
                        
            ]);
            return redirect()->route('admin.userprofile', [$user_id])->with('challenge', 'berhasil meluluskan');

        }else {
            return redirect()->route('admin.userprofile', [$user_id])->with('challengeerror', 'Isi Penilaian terlebih dahulu');
        }
        
        
    }

    public function seleksi2_gagal($user_id)
    {
        $title = 'Admin User Profile';

        $penilaian = DB::table('penilaian_challenge')
            ->where('user_id', $user_id)
            ->value('id');
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        $nama = DB::table('biodata')
            ->where('user_id', $user_id)
            ->value('nama');

        if (!empty($penilaian)){
            User::where('id', $user_id)->update(['level' => '2']);
            Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'GUGUR']);
            seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
            return redirect()->route('admin.userprofile', [$user_id])->with('challenge', 'berhasil menggagalkan');
        }else {
            User::where('id', $user_id)->update(['level' => '2']);
            Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'GUGUR']);
            seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
            $penilaian_challenge = new Penilaian;
            $penilaian_challenge->user_id = $user_id;
            $penilaian_challenge->nama = $nama;
            $penilaian_challenge->writing = 0;
            $penilaian_challenge->video = 0;
            $penilaian_challenge->business = 0;
            $penilaian_challenge->total = 0;
            $penilaian_challenge->penjualan = 0;
            $penilaian_challenge->point = 0;
            $penilaian_challenge->gen = $gen;
            $penilaian_challenge->save();
            return redirect()->route('admin.userprofile', [$user_id])->with('challenge', 'berhasil menggagalkan');
        }
        
        
    }
    public function challenge_lulus($user_id,$nama)
    {
        User::where('id', $user_id)->update(['level' => '1']);
        Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'LOLOS']);
        $antrian = DB::table('controller')
            ->where('id', 1)
            ->value('antrian');
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
            $antrian++;
            $antrian_interview = new Antrian;
            $antrian_interview->user_id = $user_id;
            $antrian_interview->nama = $nama;
            $antrian_interview->antrian = $antrian;
            $antrian_interview->gen = $gen;
            $antrian_interview->absen = "Tidak Hadir";
            $antrian_interview->save();
            DB::table('controller')->where('id',1)->update([            
                'antrian'=> $antrian,
                'updated_at'=> now(),
                        
            ]);
            return redirect()->route('admin.challenge.rank')->with('berhasil', 'berhasil meluluskan');


    }
    public function challenge_gagal($user_id,$r)
    {

        $penilaian = DB::table('penilaian_challenge')
            ->where('user_id', $user_id)
            ->value('id');
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        $nama = DB::table('biodata')
            ->where('user_id', $user_id)
            ->value('nama');

        if (!empty($penilaian)){
            User::where('id', $user_id)->update(['level' => '2']);
            Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'GUGUR']);
            seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
            if($r == 0){
                return redirect()->route('admin.challenge')->with('challenge', 'berhasil menggagalkan');
            }else {
                return redirect()->route('admin.challenge.rank')->with('challenge', 'berhasil menggagalkan');
            }
            

        }else {
            User::where('id', $user_id)->update(['level' => '2']);
            Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'GUGUR']);
            seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
            $penilaian_challenge = new Penilaian;
            $penilaian_challenge->user_id = $user_id;
            $penilaian_challenge->nama = $nama;
            $penilaian_challenge->writing = 0;
            $penilaian_challenge->video = 0;
            $penilaian_challenge->business = 0;
            $penilaian_challenge->total = 0;
            $penilaian_challenge->penjualan = 0;
            $penilaian_challenge->point = 0;
            $penilaian_challenge->gen = $gen;
            $penilaian_challenge->save();
            if($r == 0){
                return redirect()->route('admin.challenge')->with('challenge', 'berhasil menggagalkan');
            }else {
                return redirect()->route('admin.challenge.rank')->with('challenge', 'berhasil menggagalkan');
            }
        }
        
        
    }
    
    public function penilaian (Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'writing' => 'required|numeric',
                'video' => 'required|numeric',
                'penjualan' => 'required|numeric',

                

            ],

            $messages = [
                
                'writing.required' => 'Harus angka !',
                'video.required' => 'Harus angka!',
                'penjualan.required' => 'Harus angka!',
               

            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        

        
        
        $writing =$request->writing;
        $video = $request->video;
        $user_id = $request->user_id;
        $point = $request->point;
        $nbusiness = $request->penjualan;
        $business = ($nbusiness / 500000) *100;
        $total = $writing + $video + $business + $point;
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        if((($writing<=100)&&($video<=100)== true)){
            $penilaian_challenge = new Penilaian;
            $penilaian_challenge->user_id = $user_id ;
            $penilaian_challenge->nama = $request->nama;
            $penilaian_challenge->gen = $gen;
            $penilaian_challenge->writing = $writing;
            $penilaian_challenge->video = $video;
            $penilaian_challenge->business = $business;
            $penilaian_challenge->total = $total;
            $penilaian_challenge->point = $point;
            $penilaian_challenge->penjualan = $request->penjualan;
            $penilaian_challenge->save();
            seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
            return redirect()->route('admin.userprofile', [$user_id])->with('berhasil', 'berhasil  penilaian');
        }else{
            return redirect()->route('admin.userprofile', [$user_id])->with('pesan', 'Penilaian melebihi yang seharusnya');
        }
        
    

    }
    public function editpenilaian (Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'writing' => 'required|numeric',
                'video' => 'required|numeric',
                'penjualan' => 'required|numeric',
                'point' => 'required|numeric',

                

            ],

            $messages = [
                
                'writing.required' => 'Harus angka !',
                'video.required' => 'Harus angka!',
                'penjualan.required' => 'Harus angka!',
                'point' => 'required|numeric',
               

            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        

        $penilaian_challenge = new Penilaian;
        $user_id = $request->user_id;
        $writing = $request->writing;
        $video = $request->video;
        $point =$request->point;
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $nbusiness = $request->penjualan;
        $business = ($nbusiness / 500000) *100;
        $total = $writing + $video + $business + $point;
            DB::table('penilaian_challenge')->where('user_id',$user_id)->update([
                
                'writing'=> $request->writing,
                'video' => $request->video,
                'business' => $business,
                'total'=> $total,
                'gen'=> $gen,
                'point'=> $point,
                'penjualan' => $request->penjualan,
                'updated_at'=> now(),
            ]);
            return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
            
        
        
        
            //return redirect()->route('admin.userprofile', [$user_id])->with('berhasil', 'berhasil ubah penilaian');
       
        
        
    

    }

    
    public function challenge_penilaian (Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'writing' => 'required|numeric',
                'video' => 'required|numeric',
                'penjualan' => 'required|numeric',

                

            ],

            $messages = [
                
                'writing.required' => 'Harus angka !',
                'video.required' => 'Harus angka!',
                'penjualan.required' => 'Harus angka!',
               

            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        

        
        $writing =$request->writing;
        $video = $request->video;
        $user_id = $request->user_id;
        $point = $request->point;
        $nbusiness = $request->penjualan;
        $business = ($nbusiness / 500000) *100;
        $total = $writing + $video + $business + $point;
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        if((($writing<=100)&&($video<=100)== true)){
            $penilaian_challenge = new Penilaian;
            $penilaian_challenge->user_id = $user_id ;
            $penilaian_challenge->nama = $request->nama;
            $penilaian_challenge->gen = $gen;
            $penilaian_challenge->writing = $writing;
            $penilaian_challenge->video = $video;
            $penilaian_challenge->business = $business;
            $penilaian_challenge->total = $total;
            $penilaian_challenge->point = $point;
            $penilaian_challenge->penjualan = $request->penjualan;
            $penilaian_challenge->save();
            seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
            return redirect()->route('admin.challenge')->with('berhasil', 'berhasil  penilaian');
        }else{
            return redirect()->route('admin.challenge')->with('pesan', 'Penilaian melebihi yang seharusnya');
        }
        
    

    }
    public function challenge_editpenilaian (Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'writing' => 'required|numeric',
                'video' => 'required|numeric',
                'penjualan' => 'required|numeric',
                'point' => 'numeric',
                
            ],
            $messages = [
                
                'writing.required' => 'Harus angka !',
                'writing.numeric' => 'harus angka',
                'video.required' => 'Harus angka!',
                'penjualan.required' => 'Harus angka!',
                'point.numeric' => 'harus angka',
               
            ]
        );
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $penilaian_challenge = new Penilaian;
        $user_id = $request->user_id;
        $writing = $request->writing ;
        $video = $request->video ;
        $point = $request->point ;
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');

        $nama = DB::table('biodata')
            ->where('user_id', $user_id)
            ->value('nama');

        
            $nbusiness = $request->penjualan ;
            $business = ($nbusiness / 500000) *100;
            $total = $writing + $video + $business + $point;
            $post   =  DB::table('penilaian_challenge')->where('user_id',$user_id)->update([
                'nama'=> $nama,
                'writing'=> $request->writing,
                'video' => $request->video,
                'business' => $business,
                'point' => $point,
                'total' => $total,
                'penjualan' => $nbusiness,
                'updated_at'=> now(),
            ]);

            return response()->json($post);
        
    }

    public function interview_hadir($user_id)
    {   
        $check = DB::table('antrian_interview')
            ->where('user_id', $user_id)
            ->value('absen');
        if($check == "Tidak Hadir"){
            DB::table('antrian_interview')->where('user_id',$user_id)->update([
                'absen' => "Hadir",
                'updated_at'=> now(),
            ]);
                return redirect()->route('admin.interview.antrian')->with('berhasil', 'hadir bos');
            
        }else{
            DB::table('antrian_interview')->where('user_id',$user_id)->update([
                'absen' => "Tidak Hadir",
                'updated_at'=> now(),
            ]);
                return redirect()->route('admin.interview.antrian')->with('salah', 'salah klik');
        }
        
        
        
    }
    public function allDaftarUlang(){
        $title = 'Gagal Login';
        $seleksiPertama = seleksiPertama::all();
        $users = User::where('level', 3)->get();
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        $jumlah=count($users);
        for ($i = 0; $i <= $jumlah-1; $i++) {
            $user_id = $users[$i]['id'];
            $email = $users[$i]['email'];
            $biodata = new Biodata;
            $biodata->user_id = $user_id;
            $biodata->nama = "gagal";
            $biodata->email = $email;
            $biodata->jenis_kelamin = "Pria";
            $biodata->tanggal_lahir = now();
            $biodata->domisili = "Lainnya";
            $biodata->alamat_domisili = "gagal";
            $biodata->phonenumber = "gagal";
            $biodata->aktivitas = "Yang lain";
            $biodata->minatprogram = "gagal";
            $biodata->alasanBeasiswa = "gagal";
            $biodata->five_pros = "gagal";
            $biodata->five_cons = "gagal";
            $biodata->url_foto = "gagal" ;
            $biodata->seleksi_berkas = "GAGAL" ;
            $biodata->save();
            User::where('id', $user_id)->update(['level' => '2']);

          }
        return redirect()->route('admin.gagaldaftar')->with('berhasil', 'bersihkan biodata');
    }
    public function allGagal(){
        $title = 'Admin Seleksi Challenge';
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        $challenge = seleksiPertama::where('checked', 0)->get();
        $jumlah=count($challenge);
        $penilaian = Penilaian::get();
        $r=0;
        for ($i = 0; $i <= $jumlah-1; $i++) {
            $user_id = $challenge[$i]['user_id'];
            $nama = $challenge[$i]['nama'];
            User::where('id', $user_id)->update(['level' => '2']);
            Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'GUGUR']);
            seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
            $penilaian_challenge = new Penilaian;
            $penilaian_challenge->user_id = $user_id;
            $penilaian_challenge->nama = $nama;
            $penilaian_challenge->writing = 0;
            $penilaian_challenge->video = 0;
            $penilaian_challenge->business = 0;
            $penilaian_challenge->total = 0;
            $penilaian_challenge->penjualan = 0;
            $penilaian_challenge->point = 0;
            $penilaian_challenge->gen = $gen;
            $penilaian_challenge->save();

          } 
          return redirect()->route('admin.challenge')->with('berhasil', 'bersihkan yang tidak mengerjakan');
    }

    public function tutupPendaftaran (Request $request){
        DB::table('control')->where('id',1)->update([
            'boolean'=> $request->pendaftaran,
            'updated_at'=> now(),
            
            
        ]);

  

        return redirect()->route('admin.control')->with('berhasil', 'ubah pendaftaran');
    }
    public function ubahChallenge (Request $request){
        DB::table('control')->where('nama','seleksiPertama')->update([
            'boolean'=> $request->seleksiPertama,
            'updated_at'=> now(),
            
            
        ]);
        $check=$request->seleksiPertama;
        switch ($check) {
            case '0':
                $gen = DB::table('control')
                    ->where('nama', 'gen')
                    ->value('integer');
                $challenge = seleksiPertama::where('checked', 0)->get();
                $jumlah=count($challenge);
                for ($i = 0; $i <= $jumlah-1; $i++) {
                    $user_id = $challenge[$i]['user_id'];
                    $nama = $challenge[$i]['nama'];
                    $pertama = seleksiPertama::where('user_id', $user_id)->first();
                    if ((($pertama->url_writing) == "#")&&(($pertama->url_video) == "#")&&(($pertama->url_Business) == "#") == 1){
                        
                        User::where('id', $user_id)->update(['level' => '2']);
                        Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'GUGUR']);
                        seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
                        
                    }

                    if(!(penilaian::where('user_id',$user_id)->exists())){
                        $penilaian_challenge = new Penilaian;
                        $penilaian_challenge->user_id = $user_id;
                        $penilaian_challenge->nama = $nama;
                        $penilaian_challenge->writing = 0;
                        $penilaian_challenge->video = 0;
                        $penilaian_challenge->business = 0;
                        $penilaian_challenge->total = 0;
                        $penilaian_challenge->penjualan = 0;
                        $penilaian_challenge->point = 0;
                        $penilaian_challenge->gen = $gen;
                        $penilaian_challenge->save();
                    }
                    
                    }
                    
                break;
            case '1':
                
                break;   
                default:
                echo "SLP INDONESIA";
                break;
        }
        
        
        
        
  

        return redirect()->route('admin.control')->with('berhasil', 'ubah tahap challenge');
    }
    public function gateQuest (Request $request){
        DB::table('control')->where('id',2)->update([
            'boolean'=> $request->quest,
            'updated_at'=> now(),
            
            
        ]);

  

        return redirect()->route('admin.control')->with('berhasil', 'mengubah daily quest');
    }
    public function resetQuest (Request $request){
        DB::table('control')->where('id',2)->update([
            'integer'=> 0,
            'updated_at'=> now(),
            
            
        ]);

  

        return redirect()->route('admin.control')->with('berhasil', 'reset daily quest');
    }
    public function nextGen (Request $request){
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $genReal = User::where('id', 1 )->value('gen');
        

        if($gen<$genReal){
            $gen = $gen + 1;
            DB::table('control')->where('nama','gen')->update([
                'integer'=> $gen,
                'updated_at'=> now(),
                
                
            ]);
            
            return redirect()->route('admin.control')->with('berhasil', 'ubah ke generasi selanjutnya');
        }else{
            return redirect()->route('admin.control')->with('error', 'belum ada generasi selanjutnya');
        }
        

  

        
    }
    public function preGen (Request $request){
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        if($gen > 1){
            $gen = $gen - 1;
            DB::table('control')->where('nama','gen')->update([
                'integer'=> $gen,
                'updated_at'=> now(),
                
                
            ]);

            return redirect()->route('admin.control')->with('berhasil', 'ubah ke generasi sebelumnya');
        }else{
            return redirect()->route('admin.control')->with('error', 'belum ada generasi sebelumnya');
        }
        
    }
    public function resetInterview (Request $request){
        DB::table('control')->where('id',5)->update([
            'integer'=> 1,
            'updated_at'=> now(),
            
            
        ]);

  

        return redirect()->route('admin.control')->with('berhasil', 'reset antrian interview');
    }

    public function generateAntrian(){
        
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        if ((Antrian::where('gen', $gen))->exists()){
            
            $users = User::where('level', 1)->where('gen', $gen)->get();
            $jumlah=count($users);
            for ($i = 0; $i <= $jumlah-1; $i++) {
            $user_id = $users[$i]['id'];
            $nama = DB::table('biodata')
            ->where('user_id', $user_id)
            ->value('nama');         
           
                if (Antrian::where('gen', $gen)->where('user_id', $user_id)->exists()) {
           
                }else{
                    $check = Antrian::where('gen', $gen)->max('antrian');
                    $new_antrian = $check + 1;
                    $antrian_interview = new Antrian;
                    $antrian_interview->user_id = $user_id;
                    $antrian_interview->nama = $nama;
                    $antrian_interview->antrian = $new_antrian;
                    $antrian_interview->absen = "Tidak Hadir";
                    $antrian_interview->gen = $gen;
                    $antrian_interview->save();                
                }
           
            
                

            }
            
        }else{
            $users = User::where('level', 1)->where('gen', $gen)->get();
            $jumlah=count($users);
            $penilaian = Penilaian::get();
            $r=0;
            for ($i = 0; $i <= $jumlah-1; $i++) {
                $user_id = $users[$i]['id'];
                $nama = DB::table('biodata')
                ->where('user_id', $user_id)
                ->value('nama');
                do {
                    $new_antrian = rand(1,$jumlah);                
                    if (Antrian::where('gen', $gen)->where('antrian', $new_antrian)->exists()) {
                        $ulang = 0;
                    }else{
                        $ulang = 2;
                    }
                    } while ($ulang < 1);
                
                    $antrian_interview = new Antrian;
                    $antrian_interview->user_id = $user_id;
                    $antrian_interview->nama = $nama;
                    $antrian_interview->antrian = $new_antrian;
                    $antrian_interview->absen = "Tidak Hadir";
                    $antrian_interview->gen = $gen;
                    $antrian_interview->save();
    
              } 
        }            
        
          return redirect()->route('admin.interview.antrian')->with('berhasil', 'sukses');
    }
    public function antrianNote (Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'nama' => 'required',
                'note' => 'required',
                

                

            ],

            $messages = [
                
                'user_id.required' => 'tolong dilengkapi',
                'nama.required' => 'tolong dilengkapi',
                'note.required' => 'tolong dilengkapi',
                
               

            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        

        $penilaian_challenge = new Penilaian;
        $user_id = $request->user_id;
        
        $note = $request->note;
        
        
        
      
            DB::table('antrian_interview')->where('user_id',$user_id)->update([
                
                'note' => $request->note,
                'updated_at'=> now(),
            ]);
            
     
        
        return redirect()->route('admin.interview.antrian')->with('berhasil', 'sukses');
    

    }
    
    public function seleksi3 ($user_id,$status){
        if ($status == 0){
            User::where('id', $user_id)->update(['level' => '2']);
            Biodata::where('user_id', $user_id)->update(['seleksi_kedua' => 'TERELIMINASI']);
            return redirect()->route('admin.userprofile', [$user_id])->with('challengeerror', 'berhasil menggagalkan');
            
             
        }else{
            User::where('id', $user_id)->update(['level' => '1']);
            Biodata::where('user_id', $user_id)->update(['seleksi_kedua' => 'BERHASIL']);
            return redirect()->route('admin.userprofile', [$user_id])->with('berhasil', 'berhasil meluluskan');
        }
        
    }
    public function stadiumgeneral ($user_id,$status){
        if ($status == 0){
            User::where('id', $user_id)->update(['level' => '2']);
            return redirect()->route('admin.userprofile', [$user_id])->with('challengeerror', 'berhasil menggagalkan');
            
             
        }else{

            if ((Peserta::where('user_id', $user_id))->exists()){
                Peserta::where('user_id', $user_id)->update(['aktif' => '4']);
            } else{
                $data = User::where('id', $user_id)->first();
                $biodata = Biodata::where('user_id', $user_id)->first();
                $user = new Peserta;
                $user->nama = $biodata['nama'];
                $user->status =  1;
                $user->aktif =  1;
                $user->captain = 0;
                $user->gen = $data['gen'];
                $user->grup = 0;
                $user->user_id =$data['id'];
                $user->save();
                
            }
            User::where('id', $user_id)->update(['level' => '4']);
            return redirect()->route('admin.userprofile', [$user_id])->with('berhasil', 'berhasil meluluskan');
        }
        
    }
    
    public function change_password(Request $request)

    {

        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

   

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

   
        return redirect()->route('admin.ubah.password')->with('berhasil', 'berhasil ubah password');
        //return redirect()->route('admin.listPendaftar');

    }

    public function daftar_fasil(Request $request)
    {

        $validator = Validator::make($request->all(), 
        [   
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            
            'jenis_kelamin' => 'required',
            'phonenumber' => 'required|numeric|digits_between:11,13',
            'instagram' => 'required|string',
            'prestasi' => 'required|string',
            'quotes' => 'required|string',
            'url_foto' => 'required|mimes:jpeg,png,jpg|max:8192',
            

        ],

        $messages = 
        [
            'nama.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'E-Mail tidak boleh kosong !',
            'password.required' => 'Password tidak boleh kosong',
            'jenis_kelamin.required' => 'jenis kelamin harus dipilih!',
            
            'email.unique' => 'E-Mail sudah dipakai',
            'phonenumber.numeric' => 'Nomor telpon harus berupa angka',
            'url_foto.required' => 'foto tidak boleh kosong!',
            'url_foto.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png.',
            'url_foto.max' => 'Ukuran file terlalu besar, maksimal file 8Mb !',


        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }
        
        

        $detail=$request->prestasi;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/imgfasil/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $detail = $dom->saveHTML();

        //Table Users
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 5;
        $user->gen = 0;
        $user->save();

         //Table fasil
        $user_id = $user->id;
        $fasil = new Fasil;
        $fasil->nama =   $request->nama;
        $fasil->email = $request->email;
        $fasil->jenis_kelamin = $request->jenis_kelamin;
        $fasil->instagram = $request->instagram;
        $fasil->phonenumber =$request->phonenumber;
        $fasil->prestasi = $detail;
        $fasil->quotes = $request->quotes;
        $fasil->status = 1;
        $fasil->user_id = $user_id;
        if($file = $request->hasFile('url_foto')) 
            {
            $namaFile = $user->id;
            $file = $request->file('url_foto') ;
            $fileName = $namaFile.'_'.$file->getClientOriginalName() ;
            $fileName = preg_replace("/\s+/", "", $fileName);
            $destinationPath = public_path().'/imgfasil/' ;
            $file->move($destinationPath,$fileName);
            $fasil->url_foto = $fileName ;
        }
        $fasil->save();
        
        return redirect()->route('admin.create.fasil')->with('success', 'Registrasi Anda telah berhasil!. Silakan login dengan menggunakan email dan password Anda.');
    }

    public function add_grup (Request $request){
        $validator = Validator::make($request->all(), 
        [   
            
            'grup' => 'required|numeric',
            
            

        ],

        $messages = 
        [
            'grup.required' => 'grup tidak boleh kosong!',
            
            
            'grup.numeric' => 'grup telpon harus berupa angka',
            

        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }
        $id =  $request->user_id;
            DB::table('peserta')->where('user_id',$id)->update([
                
                'grup' => $request->grup,
                'updated_at'=> now(),
            ]);
            return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
            //return redirect()->route('admin.peserta.pengelompok')->with('pesan', 'berhasil update'); 

        
    }

    public function delete_grup($id){
        DB::table('peserta')->where('user_id',$id)->update([
                
            'grup' => NULL,
            'updated_at'=> now(),
        ]);
        return redirect()->route('admin.peserta.pengelompok')->with('challenge', 'berhasil menghapus');
    }

    public function add_grupFasil (Request $request){
        $validator = Validator::make($request->all(), 
        [   
            
            'grup' => 'required|numeric',
            
            

        ],

        $messages = 
        [
            'grup.required' => 'grup tidak boleh kosong!',
            
            
            'grup.numeric' => 'grup telpon harus berupa angka',
            

        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }
        $id =  $request->user_id;
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        
       
        if (FasilRecord::where('gen', $gen)->where('user_id', $id)->where('status', 1)->exists()) {
            
            if(FasilRecord::where('gen', $gen)->where('grup', $request->grup)->where('status', 1)->orWhere('status', 3)->exists()){
                return Redirect::back()->with('challenge','Tidak bisa ubah grup karena sudah ada');
            }
            else{
                DB::table('fasil')->where('user_id',$id)->update([
                
                    'grup' => $request->grup,
                    'updated_at'=> now(),
                ]);
                FasilRecord::where('user_id',$id)->update([
                
                    'grup' => $request->grup,
                    'updated_at'=> now(),
                    
                ]);
                return Redirect::back()->with('pesan','Operation Successful !');
            }
            
        }else{
            DB::table('fasil')->where('user_id',$id)->update([
                
                'grup' => $request->grup,
                'updated_at'=> now(),
            ]);
            $record = new FasilRecord;
        $record->nama = $request->nama;
        $record->status =  1;
        $record->valid = 0;
        $record->gen = $gen;
        $record->grup =  $request->grup;
        $record->user_id = $request->user_id;
        $record->awal = now();
        $record->save();
        return Redirect::back()->with('pesan','Operation Successful !');

        }
        
        
    }
    public function delete_grupFasil($id){
        $gen = DB::table('control')
            ->where('id', 4)
            ->value('integer');
        Fasil::where('user_id',$id)->update([
                
            'grup' => NULL,
            'updated_at'=> now(),
        ]);
        FasilRecord::where('gen', $gen)->where('user_id', $id)->where('status', 1)->update([
                
            'status' => 2,
            'akhir'=> now(),
            'updated_at'=> now(),
        ]);
        return Redirect::back()->with('challenge', 'berhasil menghapus');
    }
    public function aktivasi_fasil($id,$r){
        switch ($r) {
            case '0':
            Fasil::where('user_id',$id)->update([
                
            'status' => 0,
            'updated_at'=> now(),
            ]);
            return Redirect::back()->with('challenge','Operation Successful !');
                break;
            case '1':
            Fasil::where('user_id',$id)->update([
                
            'status' => 1,
            'updated_at'=> now(),
            ]);
            return Redirect::back()->with('berhasil','Operation Successful !');
                break;   
                default:
                echo "SLP INDONESIA";
                break;
        }

    }
    public function create_controller(Request $request)
    {

        $validator = Validator::make($request->all(), 
        [   
            'nama' => 'required|alpha|max:255',
            
            

        ],

        $messages = 
        [
            'nama.required' => 'Nama tidak boleh kosong!',
            


        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }
        

        //Table control
        $controller = new Control;
        $controller->nama = $request->nama;
        $controller->string = $request->string;
        $controller->boolean = $request->boolean;
        $controller->integer = $request->integer;
        $controller->date = $request->date;
        $controller->save();
        
        return redirect()->route('admin.controller.create')->with('pesan', 'Controller terbuat');
    }

    public function daily_quest()
    {  
        $title = 'Daily Quest';
        $hari = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        $gen = DB::table('control')
            ->where('id', 4)
            ->value('integer');
        
        $daily_quest = DB::table('users')
                    ->join('peserta', 'peserta.user_id', '=', 'users.id')
                    ->join('daily_quest', 'daily_quest.user_id', '=', 'users.id')
                    
                    ->where('day', $hari)->orderBy('status', 'DESC')->get();

        return view('admin.dailyQuest', compact('title', 'daily_quest','hari'));
    }

    public function detailQuest($uid,$quest_id){
        $title = 'Detail Quest Peserta';
        $user_id = Auth::user()->id;
        
        
        $user = User::where('id', $user_id)
            ->first();
        $quest = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        
            $data = Quest::where('id', $quest_id)->first();
            $peserta = DB::table('peserta')
            ->where('user_id', $uid)
            ->value('nama');
            $daily_quest = Quest::where('user_id', $uid)->get();
            return view('admin.ubahQuest', compact('title', 'user', 'quest','data','peserta','daily_quest'));
        
            
        
       
        
    }

    public function writing_quest(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'writing' => 'required|string|max:255',
                'writing_komentar' => 'required',
            ],

            $messages = [
                'writing.required' => 'tidak boleh kosong!',
                'writing_komentar.required' => 'tidak boleh kosong!',
               
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        
        $id=$request->id;
        Quest::where('id', $id)
                ->update([
                    'topik_writing' => $request->writing,
                    'komentar_writing' => $request->writing_komentar,
                    'writing_check' => $request->poin,
                    'updated_at' => now(),
                ]);
        

        
        return Redirect::back()->with('pesan','Operation Successful !');
    }

    public function video_quest(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'video' => 'required|string|max:255',
                'video_komentar' => 'required',
            ],

            $messages = [
                'video.required' => 'tidak boleh kosong!',
                'video_komentar.required' => 'tidak boleh kosong!',
               
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $id=$request->id;
        Quest::where('id', $id)
                ->update([
                    'topik_video' => $request->video,
                    'komentar_video' => $request->video_komentar,
                    'video_check' => $request->poin,
                    'updated_at' => now(),
                ]);
        

        
            return Redirect::back()->with('pesan','Operation Successful !');
    }

    public function note_quest(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'note' => 'required',
            ],

            $messages = [
                'note.required' => 'tidak boleh kosong!',
               
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        
        $id=$request->id;
        Quest::where('id', $id)
                ->update([
                    'note' => $request->note,
                    'updated_at' => now(),
                ]);
        

        
        return Redirect::back()->with('pesan','Operation Successful !');
    }
    public function batal_quest($id,$quest){
        switch ($quest) {
            case '0':
                Quest::where('id', $id)
                ->update([
                    
                    'video_check' => 0,
                    'status' => 0,
                    'updated_at' => now(),
                ]);
        

        
                return Redirect::back()->with('pesan','Operation Successful !');
                break;
            case '1':
                Quest::where('id', $id)
                ->update([
                    
                    'writing_check' => 0,
                    'status' => 0,
                    'updated_at' => now(),
                ]);
        

        
                return Redirect::back()->with('pesan','Operation Successful !');
                break;   
            case '2':
                Quest::where('id', $id)
                ->update([
                    
                    'business_check' => 0,
                    'status' => 0,
                    'updated_at' => now(),
                ]);
        

        
                return Redirect::back()->with('pesan','Operation Successful !');        
                break;
            case '3':
                Quest::where('id', $id)
                ->update([
                    
                    'status' => 0,
                    'updated_at' => now(),
                ]);
        

        
                return Redirect::back()->with('pesan','Operation Successful !');        
                break;
                default:
                echo "SLP INDONESIA";
                break;
        }
    }

    public function business_quest($id,$level){
        switch ($level) {
            case '1':
                Quest::where('id', $id)
                ->update([
                    
                    'business_check' => 1,
                    'updated_at' => now(),
                ]);
        

        
                return Redirect::back()->with('pesan','Operation Successful !');
                break;   
            case '2':
                Quest::where('id', $id)
                ->update([
                    'business_check' => 2,
                    'updated_at' => now(),
                ]);
        

        
                return Redirect::back()->with('pesan','Operation Successful !');        
                break;
                default:
                echo "SLP INDONESIA";
                break;
        }
    }
    public function download_writing($quest_id) {
        
        $id = Crypt::decrypt($quest_id);
        $file_name = DB::table('daily_quest')
            ->where('id', $id)
            ->value('writing');
        $file_path = public_path('docWriting/'.$file_name);
        return response()->download($file_path);
    }

    public function status_quest($id){
        Quest::where('id', $id)
                ->update([
                    
                    'status' => 1,
                    'updated_at' => now(),
                ]);
        

        
                return Redirect::back()->with('pesan','Operation Successful !');
    }

    public function statusPeserta($id){
        $v = DB::table('peserta')
        ->where('user_id', $id)
        ->value('aktif');
        switch ($v) {
            case '0':
                User::where('id', $id)
                ->update([
                    'level' => 4,
                    'updated_at' => now(),
                ]);
                Peserta::where('user_id', $id)
                ->update([
                    'aktif' => 1,
                    'updated_at' => now(),
                ]);
        

        
        //return Redirect::back()->with('pesan','Operation Successful !');
        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
                break;
            case '1':
                User::where('id', $id)
                ->update([
                    'level' => 2,
                    'updated_at' => now(),
                ]);
                Peserta::where('user_id', $id)
                ->update([
                    'aktif' => 0,
                    'status' => 0,
                    'updated_at' => now(),
                ]);
        

        
        //return Redirect::back()->with('pesan','Operation Successful !');
        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
                break;   
                 
                default:
                echo "SLP INDONESIA";
                break;
        }
        
       
        
    }

    public function buatBlog (){
        
        return view('admin.buatBlog');

    }
    public function createBlog (Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required|string|max:255',
                'awalan' => 'required|string|max:255',
                'summernote' => 'required',
                'link_instagram' => 'required',
                'nama' => 'required',
            ],

            $messages = [
                'judul.required' => 'judul tidak boleh kosong!',
                'judul.max' => 'judul tidak boleh melebihi 255 karakter!',
                'awalan.required' => 'awalan tidak boleh kosong!',
                'awalan.max' => 'awalan tidak boleh melebihi 255 karakter!',
                'summernote.required' => 'awalan tidak boleh kosong!',
                'link_instagram.required' => 'awalan tidak boleh kosong!',
                'nama.required' => 'awalan tidak boleh kosong!',
               
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $blog = new Blog;
        $blog->nama = $request->nama;
        $blog->link_instagram = $request->link_instagram;
        $blog->judul = $request->judul;
        $blog->awalan = $request->awalan;

        $detail=$request->summernote;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();
        $blog->artikel = $detail;
        $blog->publish = 1 ;
        
        
        $blog->save();
        
        return Redirect::back()->with('pesan','berhasil');

        
    }
    public function listBlog(Request $request){
        $data = Blog::where('publish',1)->get();
        if($request->ajax()){

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $judul = $row->judul;
                    $judul = str_replace(' ', '_', $judul);
                        $detail = route('admin.detailBlog',($judul));
                        $actionBtn = '
                        <a class="btn btn-success btn-sm" href='.$detail.' >
                                           
                                           Periksa
                                           </a>';
                        return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.listBlog');
    }

    public function detailBlog($judul){
        $judul = str_replace('_', ' ', $judul);
        $blog = Blog::where('judul', $judul)->first();
        setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');
        $tanggal = $blog->created_at;
        $tanggalbaru=Carbon::parse($tanggal)->isoFormat('D MMMM Y');
        return view('post',compact('blog','tanggalbaru'));
    }

    public function PembuatanTargetTugas(Request $request)
    {
        
        $title = 'Pembuatan Target Tugas';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data = Target::where('status', 1)->orderBy('gen', 'DESC')->orderBy('created_at', 'DESC')->get();
            if($request->ajax()){
    
                return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $detail = route('admin.DetailTargetTugas', $row->id);
                        $id = $row->id;
                        $b = '
                        <a class="btn btn-primary btn-sm" href='.$detail.'>
                        <i class="fas fa-folder"></i>detail</a>';
                        $actionBtn = $b.' 
                            <a id="hapus" data-toggle="modal" data-target="#modal-danger'.$id.'" class="btn btn-danger btn-sm">Hapus</a></dl>
                                                            <div class="modal fade" id="modal-danger'.$id.'">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Penolakan</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">    
                                                                                <p>Apa anda yakin ingin menghapus Target Tugas ini ?</p>
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

        return view('admin.pembuatanTargetTugas', compact('title', 'gen'));

        
    }
    public function DeleteTargetTugas($id)
    {
        Target::where('id', $id)->update([
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        return response()->json(['success'=>'Hapus Target Tugas']);
        
    }
    public function AddTargetTugas(Request $request){
        $validator = Validator::make($request->all(), 
        [   
            'judul' => 'required|string|max:255',
            'keterangan' => 'required',
            'tipe_tugas' => 'required|string',
            'gen' => 'required|integer',
            'jumlah' => 'required|numeric',
            'mulai' => 'required|date',
            
            

        ],

        $messages = 
        [
            'judul.required' => 'Judul tidak boleh kosong!',
            'keterangan.required' => 'keterangan tidak boleh kosong !',
            'tipe_tugas.required' => 'tipe tugas tidak boleh kosong',
            'gen.required' => 'generasi tidak boleh kosong',
            
            'jumlah.numeric' => 'jumlah harus berupa angka',
            
            


        ]);     

        if($validator->fails())
        {
            return response()->json(['status'=>0, 'msg'=>'periksa input','error'=>$validator->errors()->all()]);
        }
        
        

        $detail=$request->keterangan;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();

        
        $target = new Target;
        $target->judul = $request->judul;
        $target->keterangan = $detail;
        $target->tipe_tugas = $request->tipe_tugas;
        $target->jumlah = $request->jumlah;
        $target->gen = $request->gen;
        $target->mulai = $request->mulai;
        $target->status = 1;
        $target->save();
        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
    }

    public function PemeriksaanTugasWriting()
    {
        $title = 'Pemeriksaan Tugas Writing';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        

        return view('admin.PemeriksaanTugasWriting', compact('title', 'gen'));
    }
    public function PemeriksaanTugasWritingDetail()
    {
       
        

        $title = 'Pemeriksaan Tugas Writing Detail';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        
        $user = User::where('id', 2)
            ->first();
        $quest = 0;
        
            $data = 0;
            $peserta =0;
            $daily_quest = 0;
            return view('admin.PemeriksaanTugasWritingDetail', compact('title', 'user', 'quest','data','peserta','daily_quest'));
    }

    public function DetailTargetTugas($id)
    {
        $title = 'Detail Target Tugas';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $genMax = Target::where('status', 1)
            ->max('gen');
        $target = Target::where('id', $id)->first();

        if(($gen == $target->gen)&&($genMax == $target->gen)){
            $boolean = 1;
        }else{
            $boolean = 0;
        }
        $tanggal_mulai = $target->mulai;
        $tanggal_mulai=Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y');
        return view('admin.detailTargetTugas', compact('title', 'gen','target','tanggal_mulai','boolean'));
    }

    public function EditTargetTugas(Request $request, $id){
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
            $targetLama = Target::where('id', $id)->first();
            $judul_new = $request->judul;
            $jumlah_new = $request->jumlah;
            $gen_new = $request->gen;
            $mulai_new = $request->mulai;
            
    
            if($judul_new == NULL){
                $judul_new = $targetLama->judul;    
            }
            if($jumlah_new == NULL){
                $jumlah_new = $targetLama->jumlah;    
            }
            if($gen_new == NULL){
                $gen_new = $targetLama->gen;    
            }
            if($mulai_new == NULL){
                $mulai_new = $targetLama->mulai;
                    
            }
            $mulai_new=Carbon::parse($mulai_new)->format('Y/m/d');
            $detail=$request->keterangan;
            if (!empty($detail)){
                $dom = new \DomDocument();
                $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $detail = $dom->saveHTML();
                $keterangan_new = $detail;
            } else{
                $keterangan_new = $targetLama->keterangan;  
            }
           
                Target::where('id', $id)->update([
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

    public function NewGate(){

        //preparation for ritual

        $pendaftaran = Control::where('nama', 'pendaftaran')->value('boolean');
        $seleksi_pertama = Control::where('nama', 'seleksiPertama')->value('boolean');
        
        $genReal = User::where('id', 1 )->value('gen');

        $maxgen = User::where('id','!=',1)->max('gen');
        // action

        if($maxgen == $genReal){

            $data = FasilRecord::where('status', 1)->where('gen', $genReal)->get();
            $jumlah_data = count($data);
        
                for ($i = 0; $i <= $jumlah_data-1; $i++) {                
                    $id = $data[$i]['id'];
                    FasilRecord::where('id', $id)->update([
                        // 1 = aktive, 2 = berhenti, 3 = selesai
                        'status' => 3,
                        'akhir'=> now(),
                        'updated_at'=> now(),
                    ]);

                    $user_id = $data[$i]['user_id'];
                    Fasil::where('user_id', $user_id)->update([
                
                        'grup' => NULL,
                        'updated_at'=> now(),
                    ]);
                
                }
            $gen = $maxgen + 1;
            Control::where('nama', 'pendaftaran')->update([
                'boolean' => 1,           
                'updated_at' => now(),
                ]
            );
            Control::where('nama', 'seleksiPertama')->update([
                'boolean' => 1,           
                'updated_at' => now(),
                ]
            );
            Control::where('nama', 'gen')->update([
                'integer' => $gen,           
                'updated_at' => now(),
                ]
            );

            User::where('id', 1)->update([
                'gen' => $gen,           
                'updated_at' => now(),
                ]
            );
            return redirect()->route('admin.control')->with('berhasil', 'Membuka Generasi Baru');
        }else{
            return redirect()->route('admin.control')->with('error', 'Tidak Bisa Membuka Generasi Baru');
        }   
    }

    public function ListSemuaPeserta(Request $request){
        $title = 'Admin Peserta Pengelompokkan';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data = DB::table('users')
                    ->join('biodata', 'biodata.user_id', '=', 'users.id')
                    ->join('peserta', 'peserta.user_id', '=', 'users.id')
                    //->join('peserta', 'peserta.user_id', '=', 'users.id')
                    ->where('users.level', 4)
                    ->get();
        
        
        if($request->ajax()){
                return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('Rapor', function($row){
                        $detail = route('admin.userprofile', $row->user_id);
                        $writing = route('admin.raporTugasWriting', $row->user_id);
                        $speaking = route('admin.raporTugasSpeaking', $row->user_id);
                        $entrepreneur = route('admin.raporTugasEntrepreneur', $row->user_id);
                        return '<a type="button"  href='.$writing.' class="btn btn-sm btn-outline-primary m-2 " target="_blank"><i class="fa fa-edit"></i>Writing</a>
                        <a type="button"  href='.$speaking.' class="btn btn-sm btn-outline-info m-2" target="_blank"><i class="fa fa-edit"></i>Speaking</a>
                        <a type="button"  href='.$entrepreneur.' class="btn btn-sm btn-outline-danger m-2" target="_blank"><i class="fa fa-edit"></i>Entrepreneur</a>
                        ';
                        
    
                    })
                    ->addColumn('Gender', function($row){
                        $check = $row->jenis_kelamin;
                        if(($check)== 'Pria'){
                            return '<p class="text-primary">Pria</p>';
                        }
                        if(($check)== 'Wanita'){
                            return '<p class="text-success">Wanita</p>';
                        }
                        
                    })
                    ->addColumn('Status', function($row){
                        $v = $row->aktif;
                        if (($v)== '0'){
    
                            return '<p class="text-danger">non-aktif</p>';    
                        }else{
    
                            return '<p class="text-success">aktif</p>';  
                        }
                        return 'test';
                    })
                    ->addColumn('action', function($row){
                    $check = $row->aktif;
                    $detail = route('admin.userprofile', $row->user_id);
                    $id = $row->user_id;
                    $nama = $row->nama;
                    
                
                            return '
                            <a class="btn btn-primary btn-sm m-2"  href='.$detail.'>
                            <i class="fas fa-folder"> </i>
                            Detail
                            </a>
                            ';  
                                
                   
                    
                        
                    })
                    ->rawColumns(['Rapor','Gender', 'Status', 'action'])
                    ->make(true);
            }
        return view('admin.ListSemuaPeserta', compact('title'));
    }

    public function ListSemuaPendaftar(Request $request)
    {
        $title = 'List Semua Pendaftar';
        $biodata = Biodata::all();
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        $data = User::join('biodata', 'biodata.user_id', '=', 'users.id')
                    ->where('level', 2)->get();
        if($request->ajax()){

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('Gender', function($row){
                    $check = $row->jenis_kelamin;
                    if(($check)== 'Pria'){
                        return '<p class="text-primary">Pria</p>';
                    }
                    if(($check)== 'Wanita'){
                        return '<p class="text-success">Wanita</p>';
                    }
                    
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
                    $ajaib = $row->seleksi_pertama;
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
                })->rawColumns(['Gender','Seleksi Berkas','Seleksi Challenge','Seleksi Interview', 'action'])
                ->make(true);
        }

        return view('admin.ListSemuaPendaftar');
    }

    public function welcome()
    {
        $title = 'Welcome Admin';
        
        $gen =  Auth::user()->gen;

        $now = Carbon::now(); // today
        $date = Carbon::parse($now)->isoFormat('D MMMM Y');
        return view('admin.welcome', compact('gen','date'));
    }

    
}
