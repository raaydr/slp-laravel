<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Biodata;
use App\Models\Seleksi1;
use App\Models\seleksiPertama;
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

class PendaftarController extends Controller
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
        $title = 'Dashboard Calon Siswa';
        $id =  Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        $biodata = DB::table('biodata')->where('user_id', $id)->first();

        return view('user.dashboard', compact('title', 'user', 'biodata'));
    }

    public function eliminasi()
    {
        $title = 'Calon Siswa Gugur';
        $id =  Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        $biodata = DB::table('biodata')->where('user_id', $id)->first();

        return view('user.gugur', compact('title', 'user', 'biodata'));
    }
    public function seleksi1()
    {
        $title = 'Seleksi Pertama Calon Siswa';
        $id =  Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        $biodata = DB::table('biodata')->where('user_id', $id)->first();

        return view('user.seleksi1', compact('title', 'user', 'biodata'));
    }

    public function seleksiPertama(Request $request){

        $seleksi_1 = new seleksiPertama;

        $validator = Validator::make($request->all(), 
        [
            
            'url_cv' => 'required|mimes:pdf',

        ],

        $messages = 
        [
            
            'url_cv.required' => 'foto tidak boleh kosong!',
            


        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }

        //Table seleksi_1 
        $seleksi_1->id = Input::get('id');
        $seleksi_1->nama = Input::get('nama');
        if($file = $request->hasFile('url_cv')) 
            {
            $namaFile = Input::get('nama');
            $file = $request->file('url_cv');
            $fileName = $namaFile.'_'.$file->getClientOriginalName() ;
            $destinationPath = public_path().'/imgdaftar/' ;
            $file->move($destinationPath,$fileName);
            $seleksi_1->url_cv = $fileName ;
        }
        $seleksi_1->save();
     

        return redirect('pendaftar.seleksi-pertama')->with('pesan', 'Upload Berhasil');
    }

    public function daftarUlang(Request $request)

    {

        $validator = Validator::make($request->all(), 
        [   
            'nama' => 'required|string|max:255',
            
            
            
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'domisili' => 'required',
            'alamat_domisili' => 'required|string',
            'phonenumber' => 'required|string|max:13',
            
            'aktivitas' => 'required',
            'minatprogram' => 'required',
            'alasanBeasiswa' => 'required|string',
            'five_pros' => 'required|string',
            'five_cons' => 'required|string',
            'url_foto' => 'required|mimes:jpeg,png,jpg|max:2048',

        ],

        $messages = 
        [
            'nama.required' => 'Nama tidak boleh kosong!',
            'jenis_kelamin.required' => 'jenis kelamin harus dipilih!',
            'tanggal_lahir.required' => 'tanggal lahir tidak boleh kosong!',
            
            'domisili.required' => 'Domisili harus dipilih!',
            'alamat_domisili.required' => 'alamat tidak boleh kosong!',
            'phonenumber.required' => 'Nomor telpon tidak boleh kosong!',
            'aktivitas.required' => 'Aktivitas harus dipilih!',
            'alasanBeasiswa.required' => 'Alasan Beasiswa tidak boleh kosong!',
            'five_pros.required' => '5 kelebihan tidak boleh kosong!!',
            'five_cons.required' => '5 kekurangan tidak boleh kosong!!',
            'url_foto.required' => 'foto tidak boleh kosong!',
            'url_foto.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png.',
            'url_foto.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',


        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }
        $id = Input::get('user_id');
        //Table Biodata 
        $biodata = new Biodata;
        $biodata->user_id= Input::get('user_id');
        $biodata->nama = Input::get('nama');
        $biodata->email = Input::get('email');
        $biodata->jenis_kelamin = Input::get('jenis_kelamin');
        $biodata->tanggal_lahir = Input::get('tanggal_lahir');
        $biodata->domisili = Input::get('domisili');
        $biodata->alamat_domisili = Input::get('alamat_domisili');
        $biodata->phonenumber = Input::get('phonenumber');
        $biodata->aktivitas = Input::get('aktivitas');
        $biodata->minatprogram = Input::get('minatprogram');
        $biodata->alasanBeasiswa = Input::get('alasanBeasiswa');
        $biodata->five_pros = Input::get('five_pros');
        $biodata->five_cons = Input::get('five_cons');
        if($file = $request->hasFile('url_foto')) 
            {
            $namaFile = Input::get('user_id');
            $file = $request->file('url_foto') ;
            $fileName = $namaFile.'_'.$file->getClientOriginalName() ;
            $destinationPath = public_path().'/imgdaftar/' ;
            $file->move($destinationPath,$fileName);
            $biodata->url_foto = $fileName ;
        }
        $biodata->save();
        
        User::where('id', $id)->update(['level' => '1']);
        
        $title = 'Dashboard Calon Siswa';
        $id =  Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        $biodata = DB::table('biodata')->where('user_id', $id)->first();

        return view('user.dashboard', compact('title', 'user', 'biodata'));
    }
    
}
    