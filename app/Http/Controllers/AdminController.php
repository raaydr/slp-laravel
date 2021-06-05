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
    public function coba()
    {
        $title = 'coba Admin';
        $controls = DB::table('control')
            ->where('id', 1)
            ->get();
        

        return view('admin.coba', compact('title', 'controls'));
    }
    public function view_create_controller()
    {
        $title = 'Admin create controller';
        
        

        return view('admin.createController', compact('title'));
    }

    public function index()
    {
        $title = 'Dashboard Admin';
        $users = User::where('level', 1)->where('gen', 2)->orderBy('id', 'ASC')->get();

        return view('admin.dashboard', compact('title', 'users'));
    }
    public function antrian_interview()
    {  
        $title = 'Antrian Interview';
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        //$antrian = Antrian::where('gen', $gen)->orderBy('antrian', 'ASC')->get();
        $antrian = DB::table('antrian_interview')
                    ->join('table_kepribadian', 'table_kepribadian.user_id', '=', 'antrian_interview.user_id')
                    ->where('gen', $gen)->orderBy('antrian', 'ASC')->get();

        return view('admin.antrian', compact('title', 'antrian'));
    }

    public function seleksi1()
    {
        $title = 'Seleksi Pertama Admin';
        $seleksiPertama = seleksiPertama::all();
        $users = User::where('level', 2)->get();

        return view('admin.seleksi1', compact('title', 'users'));
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
        
        

        return view('admin.userProfile', compact('title', 'user'));
    }
    public function challenge(){
        $title = 'Admin Seleksi Challenge';
        $challenge = seleksiPertama::where('checked', 0)->get();
        $jumlah=count($challenge);
        $penilaian = Penilaian::get();
        $r=0;
        

        return view('admin.seleksi3', compact('title', 'challenge', 'penilaian','r'));
    }
    public function rank_challenge(){
        $title = 'Admin Rank Challenge';
        $r=1;
        $data = DB::table('penilaian_challenge')
                    ->join('seleksiPertama', 'seleksiPertama.user_id', '=', 'penilaian_challenge.user_id')
                    ->join('biodata', 'biodata.user_id', '=', 'penilaian_challenge.user_id')
                    ->orderBy('total', 'DESC')->get();
        

        return view('admin.seleksi4', compact('title', 'data','r'));
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

    public function pengelompok_peserta(){
        $title = 'Admin Peserta Pengelompokkan';
        
        $users = User::where('level', 4)->get();
        $grup1 = Peserta::where('grup',1)->get();
        $grup2 = Peserta::where('grup',2)->get();
        $grup3 = Peserta::where('grup',3)->get();
        

        return view('admin.pengelompokPeserta', compact('title','users','grup1','grup2','grup3'));
    }
// Method LULUS GAGAL
    public function seleksi1_lulus($user_id)
    {
        $title = 'Admin User Profile';
        
        User::where('id', $user_id)->update(['level' => '1']);
        Biodata::where('user_id', $user_id)->update(['seleksi_berkas' => 'LULUS']);
        $users=User::find($user_id)->biodata;
        $seleksiPertama=User::find($user_id)->seleksiPertama;
        $pdf=User::find($user_id)->userPDF;
        return redirect()->route('admin.userprofile', [$user_id]);
        
    }

    public function seleksi1_gagal($user_id)
    {
        $title = 'Admin User Profile';
        
        User::where('id', $user_id)->update(['level' => '2']);
        Biodata::where('user_id', $user_id)->update(['seleksi_berkas' => 'GAGAL']);
        seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
        $users=User::find($user_id)->biodata;
        $seleksiPertama=User::find($user_id)->seleksiPertama;
        $pdf=User::find($user_id)->userPDF;
        return redirect()->route('admin.userprofile', [$user_id]);
        
    }

    public function seleksi2_lulus($user_id)
    {
        
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
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
        

        
        
        $writing = Input::get('writing');
        $video = Input::get('video');
        $user_id = Input::get('user_id');
        $point = Input::get('point');
        $nbusiness = Input::get('penjualan');
        $business = ($nbusiness / 500000) *100;
        $total = $writing + $video + $business + $point;
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        if((($writing<=100)&&($video<=100)== true)){
            $penilaian_challenge = new Penilaian;
            $penilaian_challenge->user_id = Input::get('user_id');
            $penilaian_challenge->nama = Input::get('nama');
            $penilaian_challenge->gen = $gen;
            $penilaian_challenge->writing = Input::get('writing');
            $penilaian_challenge->video = Input::get('video');
            $penilaian_challenge->business = $business;
            $penilaian_challenge->total = $total;
            $penilaian_challenge->point = Input::get('point');
            $penilaian_challenge->penjualan = Input::get('penjualan');
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
        $user_id = Input::get('user_id');
        $writing = Input::get('writing');
        $video = Input::get('video');
        $point = Input::get('point');
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        
        
        
        if((($writing<=100)&& ($video<=100)== true)){
            $nbusiness = Input::get('penjualan');
            $business = ($nbusiness / 500000) *100;
            $total = $writing + $video + $business + $point;
            DB::table('penilaian_challenge')->where('user_id',$user_id)->update([
                'nama'=> $request->nama,
                'writing'=> $request->writing,
                'video' => $request->video,
                'business' => $business,
                'total'=> $total,
                'gen'=> $gen,
                'point'=> $request->point,
                'penjualan' => $request->penjualan,
                'updated_at'=> now(),
            ]);
            
            return redirect()->route('admin.userprofile', [$user_id])->with('berhasil', 'berhasil ubah penilaian');
        }else{
            return redirect()->route('admin.userprofile', [$user_id])->with('pesan', 'Penilaian melebihi yang seharusnya');
        }
        
        
    

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
        

        
        
        $writing = Input::get('writing');
        $video = Input::get('video');
        $user_id = Input::get('user_id');
        $point = Input::get('point');
        $nbusiness = Input::get('penjualan');
        $business = ($nbusiness / 500000) *100;
        $total = $writing + $video + $business + $point;
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        if((($writing<=100)&&($video<=100)== true)){
            $penilaian_challenge = new Penilaian;
            $penilaian_challenge->user_id = Input::get('user_id');
            $penilaian_challenge->nama = Input::get('nama');
            $penilaian_challenge->gen = $gen;
            $penilaian_challenge->writing = Input::get('writing');
            $penilaian_challenge->video = Input::get('video');
            $penilaian_challenge->business = $business;
            $penilaian_challenge->total = $total;
            $penilaian_challenge->point = Input::get('point');
            $penilaian_challenge->penjualan = Input::get('penjualan');
            $penilaian_challenge->save();
            seleksiPertama::where('user_id', $user_id)->update(['checked' => 1]);
            return redirect()->route('admin.challenge')->with('berhasil', 'berhasil  penilaian');
        }else{
            return redirect()->route('admin.challenge')->with('pesan', 'Penilaian melebihi yang seharusnya');
        }
        
    

    }
    public function challenge_editpenilaian (Request $request)
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
        $user_id = Input::get('user_id');
        $writing = Input::get('writing');
        $video = Input::get('video');
        $point = Input::get('point');
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        
        
        
        if((($writing<=100)&& ($video<=100)== true)){
            $nbusiness = Input::get('penjualan');
            $business = ($nbusiness / 500000) *100;
            $total = $writing + $video + $business + $point;
            DB::table('penilaian_challenge')->where('user_id',$user_id)->update([
                'nama'=> $request->nama,
                'writing'=> $request->writing,
                'video' => $request->video,
                'business' => $business,
                'total'=> $total,
                'gen'=> $gen,
                'point'=> $request->point,
                'penjualan' => $request->penjualan,
                'updated_at'=> now(),
            ]);
            
            return redirect()->route('admin.challenge.rank')->with('berhasil', 'berhasil  penilaian');
        }else{
            return redirect()->route('admin.challenge.rank')->with('pesan', 'Penilaian melebihi yang seharusnya');
        }
        
        
    

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

  

        return redirect()->route('admin.coba')->with('berhasil', 'menutup pendaftaran');
    }

    public function generateAntrian(){
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        $challenge = Biodata::where('seleksi_pertama', 'LOLOS')->get();
        $jumlah=count($challenge);
        $penilaian = Penilaian::get();
        $r=0;
        for ($i = 0; $i <= $jumlah-1; $i++) {
            $user_id = $challenge[$i]['user_id'];
            $nama = $challenge[$i]['nama'];
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
        $user_id = Input::get('user_id');
        
        $note = Input::get('note');
        
        
        
      
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

   

        return redirect()->route('admin.dashboard');

    }

    public function daftar_fasil(Request $request)
    {

        $validator = Validator::make($request->all(), 
        [   
            'nama' => 'required|alpha|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            
            'jenis_kelamin' => 'required',
            'phonenumber' => 'required|numeric|digits_between:12,13',
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
            'nama.alpha' => 'Harus berupa alfabet !',
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
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
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
        $gen = DB::table('controller')
            ->where('id', 1)
            ->value('gen');
        $id =  Input::get('user_id');

        if (Peserta::where('gen', $gen)->where('user_id', $id)->exists()) {
            DB::table('peserta')->where('user_id',$id)->update([
                
                'grup' => $request->grup,
                'updated_at'=> now(),
            ]);
            return redirect()->route('admin.peserta.pengelompok')->with('pesan', 'berhasil update');
        } else{
             //Table Peserta
            $user = new Peserta;
            $user->nama = Input::get('nama');
            $user->status =  1;
            $user->captain = 0;
            $user->gen = $gen;
            $user->grup =  Input::get('grup');
            $user->user_id = Input::get('user_id');
            $user->save();
            return redirect()->route('admin.peserta.pengelompok')->with('berhasil', 'berhasil menambahkan grup');
        }
        
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
        $id =  Input::get('user_id');

        
        DB::table('fasil')->where('user_id',$id)->update([
                
                'grup' => $request->grup,
                'updated_at'=> now(),
        ]);
        return redirect()->route('admin.list.fasil')->with('pesan', 'berhasil update');
        
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
        $controller->nama = Input::get('nama');
        $controller->string = Input::get('string');
        $controller->boolean = Input::get('boolean');
        $controller->integer = Input::get('integer');
        $controller->date = Input::get('date');
        $controller->save();
        
        return redirect()->route('admin.controller.create')->with('pesan', 'Controller terbuat');
    }
}
