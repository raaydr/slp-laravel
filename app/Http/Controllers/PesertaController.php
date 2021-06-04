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
use Illuminate\Support\Facades\Input;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;

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

        $fasil = Fasil::where('grup', $grup)->first();
        $peserta = Peserta::where('grup',$grup)->get();
        //dd($fasil);
        return view('peserta.grup', compact('title', 'user','fasil','peserta'));
    }

    public function userProfile($user_id)
    {
        $title = 'Peserta Profile';
        
        $user = User::where('id', $user_id)->first();
        
        

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

    public function daily_quest(Request $request)
    {

        $validator = Validator::make($request->all(), 
        [   
            'writing' => 'mimes:doc,pdf,docx,zip,pdf|max:2048',
            'business' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'hasil' => 'required',
            
            

        ],

        $messages = 
        [
            'business.required' => 'foto tidak boleh kosong!',
            'business.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png, pdf.',
            'business.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',
            'writing.image' => 'Format file tidak mendukung! Gunakan doc,pdf,docx,zip,pdf',
            'writing.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',
            'hasil.required' => 'grup tidak boleh kosong!',


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
                'writing.required' => 'Hasil Tes tidak boleh kosong!',
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
    function downloadWriting($file_name){
        $file = Storage::disk('public')->get($file_name);
  
        return (new Response($file, 200))
              ->header('Content-Type', 'image/jpeg');
    }
    
}
