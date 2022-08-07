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
use App\Models\FasilRecord;
use App\Models\Quest;
use App\Models\Target;
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

class PesertaController extends Controller
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
        $title = 'Dashboard Peserta';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('users')
            ->where('id', $id)
            ->get();
        
        return view('peserta.pengumuman', compact('title', 'user','biodata'));
    }
    public function grup_peserta()
    {
        $title = 'Grup Peserta';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $grup = DB::table('peserta')
            ->where('user_id', $id)
            ->value('grup');
        $fasil_id = FasilRecord::where('gen',$user->gen)->where('status',1)->orWhere('status',3)->where('grup',$grup)->value('user_id');
        $fasil = Fasil::where('user_id', $fasil_id)->first();
        $peserta = Peserta::where('grup',$grup)->get();
        //dd($fasil);
        return view('peserta.grup', compact('title', 'user','fasil','peserta'));
    }

    public function userProfile($user_id)
    {
        $title = 'Peserta Profile';
        $id = Crypt::decrypt($user_id);
        $user = User::where('id', $id)->first();
        
        

        return view('peserta.userProfile', compact('title', 'user'));
    }

    public function quest(){
        $title = 'Daily Quest Peserta';
        $id = Auth::user()->id;
        $user = User::where('id', $id)
            ->first();
        $quest = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        if (Quest::where('user_id', $id)->where('day', $quest)->exists()){
            $data = Quest::where('user_id', $id)->where('day', $quest)->first();
            return view('peserta.editQuest', compact('title', 'user', 'quest','data'));
        }else{
            return view('peserta.quest', compact('title', 'user', 'quest'));
        }
        
    }

    public function questRecord(){
        $title = 'Daily Quest Peserta';
        $id = Auth::user()->id;
        $user = User::where('id', $id)
            ->first();
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
            if($v==1){
                $video_challenge = $video_challenge + $v;
            }
            $w = $record[$i]['writing_check'];
            if($w==1){
                $writing_challenge = $writing_challenge + $w;
            }
            $b = $record[$i]['business_check'];
            if($b==1){
                $business_challenge = $business_challenge + $b;
                $h = $record[$i]['hasil'];
                $hasil_business = $hasil_business + $h;
            }

          }
        $rate_video = ($video_challenge / $quest) *100;
        $rate_writing = ($writing_challenge / $quest) *100;
        $rate_business = ($business_challenge / $quest) *100;
        $rate_hasil = ($hasil_business / 2000000) *100;
        $data = array(
            "video" => $rate_video,
            "writing" => $rate_writing,
            "business" => $rate_business,
            "hasil" => $rate_hasil
        ); 
         return view('peserta.recordQuest', compact('title', 'user', 'quest', 'daily_quest','data',
         'rate_video', 'rate_writing', 'rate_business', 'rate_hasil', 
         'video_challenge', 'writing_challenge', 'business_challenge', 'hasil_business'));
        
        
    }

    public function daily_quest(Request $request)
    {

        $validator = Validator::make($request->all(), 
        [   
            'writing' => 'mimes:doc,pdf,docx,zip,pdf|max:2048',
            'business' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'sumber_produk' => 'required',
            'jenis_produk' => 'required',
            'keterangan' => 'required',

            
            

        ],

        $messages = 
        [
            'business.required' => 'tidak boleh kosong!',
            'business.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png, pdf.',
            'business.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',
            'writing.image' => 'Format file tidak mendukung! Gunakan doc,pdf,docx,zip,pdf',
            'writing.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',
            'sumber_produk.required' => ' tidak boleh kosong!',
            'jenis_produk.required' => ' tidak boleh kosong!',
            'keterangan.required' => ' tidak boleh kosong!',
            'hasil.required' => ' tidak boleh kosong!',


        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }
        $id = Auth::user()->id;
        $hari = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        
        if ($business = $request->hasFile('business')) {
            $business = $request->file('business');
            $businessName = $id.'hari'.$hari.'-'.time(). '_' . $business->getClientOriginalName();
            $tujuanPath = public_path() . '/imgBusinessQuest/';
            $business->move($tujuanPath, $businessName);
        }
        if ($writing = $request->hasFile('writing')) {
            $writing = $request->file('writing');
            $writingName = $id.'hari'.$hari.'-'.time(). '_' . $writing->getClientOriginalName();
            $tujuanPath = public_path() . '/docWriting/';
            $writing->move($tujuanPath, $writingName);
        }else{
            $writingName = "tidak mengerjakan";
        }
        $harga = Input::get('hasil');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $hasil = (int) $harga_str;

        $video = Input::get('video');
        if ($video == ""){
            $video = "tidak mengerjakan";
        }
        //Table daily_quest
        $daily_quest = new Quest();
        $daily_quest->user_id = $id;
        $daily_quest->day = $hari;
        $daily_quest->video = $video;
        $daily_quest->writing = $writingName;
        $daily_quest->business = $businessName;
        $daily_quest->sumber_produk = Input::get('sumber_produk');
        $daily_quest->jenis_produk = Input::get('jenis_produk');
        $daily_quest->keterangan = Input::get('keterangan');
        $daily_quest->hasil = $hasil;

        $daily_quest->status = 0;
        $daily_quest->video_check = 0;
        $daily_quest->writing_check = 0;
        $daily_quest->business_check = 0;

        $daily_quest->save();
        
        
        return redirect()->route('peserta.daily.quest')->with('pesan', 'upload sukses');
    }

    public function writing_quest(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'writing' => 'required|mimes:doc,pdf,docx,zip,pdf|max:2048',
            ],

            $messages = [
                'writing.required' => 'tidak boleh kosong!',
                'writing.image' => 'Format file tidak mendukung! Gunakan doc,pdf,docx,zip,pdf.',
                'writing.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $id = Auth::user()->id;
        $hari = DB::table('control')
            ->where('id', 2)
            ->value('integer');
    
        

        $file = Quest::where('user_id', $id)->where('day', $hari)
            ->value('writing');
            
            if ($writing = $request->hasFile('writing')) {
                $writing = $request->file('writing');
                $writingName = $id.'hari'.$hari.'-'.time(). '_' . $writing->getClientOriginalName();
                $tujuanPath = public_path() . '/docWriting/';
                $writing->move($tujuanPath, $writingName);
            }else{
                $writingName = "tidak mengerjakan";
            }
            File::delete('docWriting/' . $file);
            Quest::where('user_id', $id)->where('day', $hari)
                ->update([
                    'writing' => $writingName,
                    'updated_at' => now(),
                ]);
        

        
        return redirect()->route('peserta.daily.quest')->with('pesan', 'ubah writing sukses');
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
        $id = Auth::user()->id;
        $hari = DB::table('control')
            ->where('id', 2)
            ->value('integer');
    
        
    
            Quest::where('user_id', $id)->where('day', $hari)
                ->update([
                    'video' => Input::get('video'),
                    'updated_at' => now(),
                ]);
        

        
        return redirect()->route('peserta.daily.quest')->with('pesan', 'berhasil mengubah link video');
    }
    public function business_quest(Request $request)
    {

        $validator = Validator::make($request->all(), 
        [   
            
            'business' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'hasil' => 'required',
            'sumber_produk' => 'required',
            'jenis_produk' => 'required',
            'summernote' => 'required',
            

        ],

        $messages = 
        [
            'business.required' => 'tidak boleh kosong!',
            'business.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png, pdf.',
            'business.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',
            'sumber_produk.required' => ' tidak boleh kosong!',
            'jenis_produk.required' => ' tidak boleh kosong!',
            'summernote.required' => ' tidak boleh kosong!',
            'hasil.required' => ' tidak boleh kosong!',


        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }
        $id = Auth::user()->id;
        $hari = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        $detail=$request->summernote;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();
        if ($business = $request->hasFile('business')) {
            $business = $request->file('business');
            $businessName = $id.'hari'.$hari.'-'.time(). '_' . $business->getClientOriginalName();
            $tujuanPath = public_path() . '/imgBusinessQuest/';
            $business->move($tujuanPath, $businessName);
        }
        $harga = Input::get('hasil');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $hasil = (int) $harga_str;
        $quest_id = Input::get('id');
        
        //Table daily_quest
        Quest::where('id', $quest_id)
                ->update([
                    'business' => $businessName,
                    'sumber_produk' => Input::get('sumber_produk'),
                    'jenis_produk' => Input::get('jenis_produk'),
                    'keterangan' => $detail,
                    'hasil' => $hasil,
                    'updated_at' => now(),
                ]);
        
        
        return redirect()->route('peserta.detail.quest',[Crypt::encrypt($quest_id)])->with('pesan', 'berhasil mengubah business challenge');
    }
    public function dashboard()
    {
        $title = 'Dashboard Calon Siswa';
        $id = Auth::user()->id;
        $user = User::where('id', $id)
            ->first();
        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();
        $seleksiPertama = User::find($id)->seleksiPertama;
        return view('peserta.dashboard', compact('title', 'user', 'biodata', 'seleksiPertama'));
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
        //Table seleksi_1
        if ($gambar = $request->hasFile('url_foto')) {
            $gambar = $request->file('url_foto');
            $GambarName = $id . '_' . $gambar->getClientOriginalName();
            $tujuanPath = public_path() . '/imgdaftar/';
            $gambar->move($tujuanPath, $GambarName);
        }

        $foto = DB::table('biodata')
            ->where('user_id', $id)
            ->value('url_foto');
        File::delete('imgdaftar/' . $foto);
        DB::table('biodata')
            ->where('user_id', $id)
            ->update([
                'url_foto' => $GambarName,
                'updated_at' => now(),
            ]);

            return redirect()->route('peserta.dashboard')->with('pesan', 'berhasil mengubah business challenge');
    }

    public function businessQuest($quest_id){
        $title = 'Business Quest Peserta';
        $id_quest = Crypt::decrypt($quest_id);
        $id = Auth::user()->id;
        $user = User::where('id', $id)
            ->first();
        
        $data = Quest::where('id', $id_quest)->first();
        return view('peserta.businessQuest', compact('title', 'user', 'data'));            
        
    }

    public function download_writing($quest_id) {
        
        $id = Crypt::decrypt($quest_id);
        $file_name = DB::table('daily_quest')
            ->where('id', $id)
            ->value('writing');
        $file_path = public_path('docWriting/'.$file_name);
        return response()->download($file_path);
      }

    public function detailQuest($quest_id){
        $title = 'Detail Quest Peserta';
        $user_id = Auth::user()->id;
        $id = Crypt::decrypt($quest_id);
        $user = User::where('id', $user_id)
            ->first();
        $quest = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        if ((Quest::where('id', $id)->where('status', 1)->exists())){
            $data = Quest::where('id', $id)->first();
            return view('peserta.detailQuest', compact('title', 'user', 'quest','data'));
        }else{
            $data = Quest::where('id', $id)->first();
            return view('peserta.ubahQuest', compact('title', 'user', 'quest','data'));
        }
       
        
    }

    public function edit_writing_quest(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'writing' => 'required|mimes:doc,pdf,docx,zip,pdf|max:2048',
            ],

            $messages = [
                'writing.required' => 'tidak boleh kosong!',
                'writing.image' => 'Format file tidak mendukung! Gunakan doc,pdf,docx,zip,pdf.',
                'writing.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
    
        $id =$request->id;
        $hari = DB::table('daily_quest')
            ->where('id', $id)
            ->value('day');
        $file = Quest::where('id', $id)->value('writing');
            
            if ($writing = $request->hasFile('writing')) {
                $writing = $request->file('writing');
                $writingName = $id.'hari'.$hari.'-'.time(). '_' . $writing->getClientOriginalName();
                $tujuanPath = public_path() . '/docWriting/';
                $writing->move($tujuanPath, $writingName);
            }else{
                $writingName = "tidak mengerjakan";
            }
            File::delete('docWriting/' . $file);
            Quest::where('id', $id)
                ->update([
                    'writing' => $writingName,
                    'updated_at' => now(),
                ]);
        

        
        return redirect()->route('peserta.detail.quest', [Crypt::encrypt($id)])->with('pesan', 'ubah writing sukses');
    }

    public function edit_video_quest(Request $request)
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
        
    
        $id = Input::get('id');
        $hari = DB::table('daily_quest')
            ->where('id', $id)
            ->value('day');
            Quest::where('id', $id)
                ->update([
                    'video' => Input::get('video'),
                    'updated_at' => now(),
                ]);
        

        
        return redirect()->route('peserta.detail.quest', [Crypt::encrypt($id)])->with('pesan', 'ubah video sukses');
    }

    public function editbusinessQuest($daily_quest){
        $title = 'Edit Business Quest';
        $id = Auth::user()->id;
        $user = User::where('id', $id)
            ->first();
        $quest_id = Crypt::decrypt($daily_quest);
        $quest = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        $data = Quest::where('id', $quest_id)->first();
        return view('peserta.editBusinessQuest', compact('title', 'user', 'quest','data'));            
        
    }

    public function edit_business_quest(Request $request)
    {

        $validator = Validator::make($request->all(), 
        [   
            
            'business' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'hasil' => 'required',
            'sumber_produk' => 'required',
            'jenis_produk' => 'required',
            'summernote' => 'required',
            

        ],

        $messages = 
        [
            'business.required' => 'tidak boleh kosong!',
            'business.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png, pdf.',
            'business.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',
            'sumber_produk.required' => ' tidak boleh kosong!',
            'jenis_produk.required' => ' tidak boleh kosong!',
            'summernote.required' => ' tidak boleh kosong!',
            'hasil.required' => ' tidak boleh kosong!',


        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }
        $daily_quest = Input::get('id');
        $id = Auth::user()->id;
        $hari = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        $detail=$request->summernote;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();
        if ($business = $request->hasFile('business')) {
            $business = $request->file('business');
            $businessName = $id.'hari'.$hari.'-'.time(). '_' . $business->getClientOriginalName();
            $tujuanPath = public_path() . '/imgBusinessQuest/';
            $business->move($tujuanPath, $businessName);
        }
        $harga = Input::get('hasil');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $hasil = (int) $harga_str;

        
        //Table daily_quest
        Quest::where('id', $daily_quest)
                ->update([
                    'business' => $businessName,
                    'sumber_produk' => Input::get('sumber_produk'),
                    'jenis_produk' => Input::get('jenis_produk'),
                    'keterangan' => $detail,
                    'hasil' => $hasil,
                    'updated_at' => now(),
                ]);
        
        
        return redirect()->route('peserta.business.editquest', [Crypt::encrypt($daily_quest)])->with('pesan', 'berhasil mengubah business challenge');
    }

    public function jualan (){
        $id = Auth::user()->id;
        $nama ="";
        $detail ="";
        if (Jualan::where('user_id', $id)->exists()){
            $nama = Jualan::where('user_id', $id)->value('nama');
            $nama = str_replace(' ', '_', $nama);
            $detail = route('Penjualan', $nama) ;
        }
        return view('peserta.jualan',compact('nama','detail'));
    }
    public function linkJualan(Request $request){
        $validator = Validator::make($request->all(), 
        [   
            
            
            'link' => 'required',
            

        ],

        $messages = 
        [
            'link.required' => 'link tidak boleh kosong!',
            


        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }
        $link = 'https://wa.me/'.($request->link);
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        if (Jualan::where('user_id', $id)->exists()){
            Jualan::where('user_id', $id)->update(['link' => $link]);
        }else{
        $Jualan = new Jualan;
        $Jualan->link = $link;
        $Jualan->nama = $user->Biodata->nama;
        $Jualan->user_id = $id;
        $Jualan->save();
        }
        return Redirect::back()->with('pesan','Pendaftaran membuat link berhasil');
    }

    public function ubah_password(){
        $title = 'peserta ubah password';
        
        

        return view('peserta.ubahpassword', compact('title'));
    }
    public function change_password(Request $request)

    {

        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

   

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

   
        return redirect()->route('peserta.ubah.password')->with('berhasil', 'berhasil ubah password');
        

    }

    public function TugasWritingPeserta()
    {
        $title = 'Tugas Writing';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('users')
            ->where('id', $id)
            ->get();
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $target = Target::where('gen', $gen)->where('status', 1)->where('tipe_tugas', "Creative Writing")->get();
        $jumlah=count($target);
        for ($i = 0; $i <= $jumlah-1; $i++) {
            $tanggal = $target[$i]['mulai'];
            $tanggal = Carbon::parse($tanggal)->isoFormat('D MMMM Y');
            $target[$i]['mulai']= $tanggal;
        }
        return view('peserta.tugasWriting', compact('title', 'user','biodata','target'));
    }

    public function inputTugasWriting($id)
    {
        $title = 'Tugas Writing';
        $target = Target::where('id', $id)-> first();
        $mulai = $target->mulai;
        
        $now = Carbon::now(); // today
        
        if ($now <= $mulai ) {
            $start = 0;
          } else {
            $start = 1;
          }
        return view('peserta.inputTugasWriting', compact('title','target','start'));
    }

    public function bug ($id){
        $target = Target::where('id', $id)->first();
        return "sukses";
    }


}
