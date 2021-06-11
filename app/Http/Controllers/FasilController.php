<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Fasil;
use App\Models\Quest;
use App\Models\Peserta;
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
            'nama' => 'required|string|max:255',
            
            'jenis_kelamin' => 'required',
            'phonenumber' => 'required|numeric|digits_between:11,13',
            'instagram' => 'required|string',
            'prestasi' => 'required|string',
            'quotes' => 'required|string',
            
            

        ],

        $messages = 
        [
            'nama.required' => 'Nama tidak boleh kosong!',
            'jenis_kelamin.required' => 'jenis kelamin harus dipilih!',
            
            'email.unique' => 'E-Mail sudah dipakai',
            'phonenumber.numeric' => 'Nomor telpon harus berupa angka',
            

        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }
        
        

        $detail=$request->prestasi;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();
        $id = Auth::user()->id;
         //Table fasil
        DB::table('fasil')
         ->where('user_id', $id)
         ->update([
            'nama' => Input::get('nama'),
            'jenis_kelamin' => Input::get('jenis_kelamin'),
            'instagram' => Input::get('instagram'),
            'phonenumber' => Input::get('phonenumber'),
            'prestasi' => $detail,
            'quotes' => Input::get('quotes'),
             'updated_at' => now(),
         ]);
        
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
            ],

            $messages = [
                'video.required' => 'tidak boleh kosong!',
               
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
                    'video_check' => 1,
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
            ],

            $messages = [
                'writing.required' => 'tidak boleh kosong!',
               
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
                    'writing_check' => 1,
                    'updated_at' => now(),
                ]);
        

        
        return Redirect::back()->with('pesan','Operation Successful !');
    }

    public function batal_quest($id,$quest){
        if ($quest == 0){
                    
            Quest::where('id', $id)
                ->update([
                    
                    'video_check' => 0,
                    'updated_at' => now(),
                ]);
        

        
                return Redirect::back()->with('pesan','Operation Successful !');
            
             
        }else{
             
            Quest::where('id', $id)
                ->update([
                    
                    'writing_check' => 0,
                    'updated_at' => now(),
                ]);
        

        
                return Redirect::back()->with('pesan','Operation Successful !');
        }
    }
    public function pesertaProfil($user_id)
    {
        $title = 'Peserta Profile';
        $id = Crypt::decrypt($user_id);  
        $user = User::where('id', $id)->first();
        $quest = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        $video_challenge = 0;
        $writing_challenge = 0;
        $business_challenge = 0;
        $hasil_business = 0;
        $record = Quest::where('user_id', $id)->where('status', 1)->get();
        $daily_quest = Quest::where('user_id', $id)->get();
        $jumlah=count($record);
        for ($i = 0; $i <= $jumlah-1; $i++) {
            $v = $record[$i]['video_check'];
            $video_challenge = $video_challenge + $v;
            $w = $record[$i]['writing_check'];
            $writing_challenge = $writing_challenge + $w;
            $b = $record[$i]['business_check'];
            $business_challenge = $business_challenge + $b;
            $h = $record[$i]['hasil'];
            $hasil_business = $hasil_business + $h;

          }
        $rate_video = ($video_challenge / $quest) *100;
        $rate_writing = ($writing_challenge / $quest) *100;
        $rate_business = ($business_challenge / $quest) *100;
        $rate_hasil = ($hasil_business / 2000000) *100;
      
        
        return view('fasil.pesertaProfile', compact('title', 'user','daily_quest','quest','rate_video', 'rate_writing', 'rate_business', 'rate_hasil', 
        'video_challenge', 'writing_challenge', 'business_challenge', 'hasil_business'));
    }
    
    public function grup_peserta()
    {
        $title = 'Grup Peserta';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $grup = DB::table('fasil')
            ->where('user_id', $id)
            ->value('grup');
        $gen = DB::table('control')
            ->where('id', 4)
            ->value('integer');

        $fasil = Fasil::where('grup', $grup)->first();
        $peserta = Peserta::where('gen',$gen)->where('grup',$grup)->get();
        //dd($fasil);
        return view('fasil.grup', compact('title', 'user','fasil','peserta'));
    }

    public function detailQuest($uid,$quest_id){
        $title = 'Detail Quest Peserta';
        $user_id = Auth::user()->id;
        $id = Crypt::decrypt($quest_id);
        
        $user = User::where('id', $user_id)
            ->first();
        $quest = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        if ((Quest::where('id', $id)->where('status', 1)->exists())){
            $data = Quest::where('id', $uid)->first();
            $peserta = DB::table('peserta')
            ->where('user_id', $uid)
            ->value('nama');
            $daily_quest = Quest::where('user_id', $uid)->get();
            return view('fasil.detailQuest', compact('title', 'user', 'quest','data','peserta','daily_quest'));
        }else{
            $data = Quest::where('id', $id)->first();
            $peserta = DB::table('peserta')
            ->where('user_id', $uid)
            ->value('nama');
            $daily_quest = Quest::where('user_id', $uid)->get();
            return view('fasil.ubahQuest', compact('title', 'user', 'quest','data','peserta','daily_quest'));
        }
       
        
    }
}
