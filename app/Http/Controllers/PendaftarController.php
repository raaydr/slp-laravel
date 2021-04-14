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
}
    