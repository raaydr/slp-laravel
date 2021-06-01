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
}
