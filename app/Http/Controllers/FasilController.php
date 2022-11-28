<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Fasil;
use App\Models\Quest;
use App\Models\Peserta;
use App\Models\Penilaian;
use App\Models\Interview;
use App\Models\Laporan;
use App\Models\Absensi;

use Redirect;
use Illuminate\Support\Facades\Input;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use Carbon\Carbon;

class FasilController extends Controller
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
    public function index()
    {
        $title = 'Dashboard Fasil';
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        
        
        return view('fasil.dashboard', compact('title', 'user'));
    }

    public function editBiodataView()
    {
        $title = 'Dashboard Fasil';
        $id = Auth::user()->id;
        $user = Fasil::where('user_id', $id)->first();
        
        
        return view('fasil.editBiodataView', compact('title', 'user'));
    }
    public function pengumuman()
    {
        $title = 'Dashboard Peserta';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('users')
            ->where('id', $id)
            ->get();
        
        return view('fasil.pengumuman', compact('title', 'user','biodata'));
    }
    public function editfoto(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'url_foto' => 'required|mimes:jpeg,png,jpg|max:2048',
            ],

            $messages = [
                'url_foto.required' => 'foto tidak boleh kosong!',
                'url_foto.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png.',
                'url_foto.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $id = Auth::user()->id;
        
        if ($gambar = $request->hasFile('url_foto')) {
            $gambar = $request->file('url_foto');
            $GambarName = $id . '_' . $gambar->getClientOriginalName();
            $GambarName = preg_replace("/\s+/", "", $GambarName);
            $tujuanPath = public_path() . '/imgfasil/';
            $gambar->move($tujuanPath, $GambarName);
        }

        $foto = DB::table('fasil')
            ->where('user_id', $id)
            ->value('url_foto');
        File::delete('imgfasil/' . $foto);
        DB::table('fasil')
            ->where('user_id', $id)
            ->update([
                'url_foto' => $GambarName,
                'updated_at' => now(),
            ]);

            return redirect()->route('fasil.dashboard')->with('pesan', 'Berhasil ubah foto');
    }
    public function editbiodata(Request $request)
    {

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
        $profileBaru = array();
        

       
        $id = Auth::user()->id;
         //Table fasil






         if($request->nama != null){
            
            $profileBaru['nama'] = $request->nama;
        }
        if($request->jenis_kelamin != null){
        
            $profileBaru['jenis_kelamin'] =  $request->jenis_kelamin;
        }
        if($request->phonenumber != null){
        
            $profileBaru['phonenumber'] =  $request->phonenumber;
        }
        if($request->instagram != null){
        
            $profileBaru['instagram'] =  $request->instagram;
        }
        if($request->quotes != null){
        
            $profileBaru['quotes'] =  $request->quotes;
        }
        if($request->prestasi != NULL){
            $detail=$request->prestasi;
            $dom = new \DomDocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $detail = $dom->saveHTML();
            $profileBaru['prestasi'] = $detail;
        }
         $profileBaru['updated_at'] = now();
         Fasil::where('user_id', Auth::user()->id )->update($profileBaru);
        
         return redirect()->route('fasil.dashboard')->with('pesan', 'Berhasil ubah biodata');
    }

    public function change_password(Request $request)

    {

        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

   

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

   

        return redirect()->route('fasil.dashboard')->with('pesan', 'Berhasil ubah password');

    }
    public function download_writing($quest_id) {
        
        $id = Crypt::decrypt($quest_id);
        $file_name = DB::table('daily_quest')
            ->where('id', $id)
            ->value('writing');
        $file_path = public_path('docWriting/'.$file_name);
        return response()->download($file_path);
    }

    public function dailyQuest()
    {
        $title = 'Daily Quest Fasil';
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $hari = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        $grup = DB::table('fasil')
            ->where('user_id', $id)
            ->value('grup');
        
        
        $quest = DB::table('users')
                    ->join('biodata', 'biodata.user_id', '=', 'users.id')
                    ->join('peserta', 'peserta.user_id', '=', 'users.id')
                    ->join('daily_quest', 'daily_quest.user_id', '=', 'users.id')
                    ->where('grup', $grup)
                    ->where('day', $hari)->orderBy('status', 'DESC')->get();
        
        return view('fasil.dailyQuest', compact('title', 'user', 'quest','hari'));
    }

    public function pesertaQuest($user_id)
    {
        $title = 'Daily Quest Fasil';
        $id = Crypt::decrypt($user_id);
        
        $hari = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        $peserta=Peserta::where('user_id', $id)->first();
        $data = Quest::where('user_id', $id)->where('day', $hari)->first();
        $daily_quest = Quest::where('user_id', $id)->get();
      
        
        return view('fasil.questPeserta', compact('title', 'data','hari','peserta','daily_quest'));
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
        
        $id=Input::get('id');
        Quest::where('id', $id)
                ->update([
                    'topik_video' => Input::get('video'),
                    'komentar_video' => Input::get('video_komentar'),
                    'video_check' => Input::get('poin'),
                    'updated_at' => now(),
                ]);
        

        
            return Redirect::back()->with('pesan','Operation Successful !');
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
        
        
        $id=Input::get('id');
        Quest::where('id', $id)
                ->update([
                    'topik_writing' => Input::get('writing'),
                    'komentar_writing' => Input::get('writing_komentar'),
                    'writing_check' => Input::get('poin'),
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
                 
                default:
                echo "SLP INDONESIA";
                break;
        }
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
        
        
        $id=Input::get('id');
        Quest::where('id', $id)
                ->update([
                    'note' => Input::get('note'),
                    'updated_at' => now(),
                ]);
        

        
        return Redirect::back()->with('pesan','Operation Successful !');
    }
    public function pesertaProfil($user_id)
    {
        $title = 'Peserta Profile';
        $user_id = Crypt::decrypt($user_id);  
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

        
        return view('fasil.pesertaProfile', compact('title', 'user','penjualan','kegiatan'));
    }
    
    public function grup_peserta(Request $request)
    {
        $title = 'Grup Peserta';
        $id = Auth::user()->id;
        $grup  = Fasil::where('user_id', $id)->value('grup');        
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data = DB::table('users')
                    ->join('biodata', 'biodata.user_id', '=', 'users.id')
                    ->join('peserta', 'peserta.user_id', '=', 'users.id')
                    //->join('peserta', 'peserta.user_id', '=', 'users.id')
                    ->where('users.gen', $gen)->where('users.level', 4)->where('peserta.grup', $grup)
                    ->get();
        
        
        if($request->ajax()){
                return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('Rapor', function($row){
                        $detail = route('fasil.userprofile', $row->user_id);
                        $writing = route('fasil.raporTugasWriting', $row->user_id);
                        $speaking = route('fasil.raporTugasSpeaking', $row->user_id);
                        $entrepreneur = route('fasil.raporTugasEntrepreneur', $row->user_id);
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
                    $detail = route('fasil.peserta.profil', Crypt::encrypt($row->user_id));
                    $id = $row->user_id;
                    $nama = $row->nama;
                    return '
                            <a class="btn btn-primary btn-sm m-2"  href='.$detail.'>
                            <i class="fas fa-folder"> </i>
                            Detail
                            </a>
                          ';  
                    
                        
                    })
                    ->rawColumns(['Rapor','Gender', 'Grup', 'Status', 'action'])
                    ->make(true);
            }
        return view('fasil.grup', compact('title'));
    }

    public function detailQuest($uid,$id){
        $quest_id = Crypt::decrypt($id);
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
            return view('fasil.ubahQuest', compact('title', 'user', 'quest','data','peserta','daily_quest'));
       
        
    }
    public function pickCaptain($v,$user_id){
        $id = Crypt::decrypt($user_id);
        switch ($v) {
            case '0':
                Peserta::where('user_id', $id)
                ->update([
                    'captain' => 1,
                    'updated_at' => now(),
                ]);
        

        
        return Redirect::back()->with('pesan','Operation Successful !');
                break;
            case '1':
                Peserta::where('user_id', $id)
                ->update([
                    'captain' => 0,
                    'updated_at' => now(),
                ]);
        

        
        return Redirect::back()->with('pesan','Operation Successful !');
                break;   
                 
                default:
                echo "SLP INDONESIA";
                break;
        }
        
       
        
    }
}
