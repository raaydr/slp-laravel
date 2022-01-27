<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Penilaian;
use App\Models\Peserta;
use AdminController;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $level = Auth::user()->level;
        switch ($level) {
            case '0':
                return redirect()->action('\App\Http\Controllers\AdminController@informasiPendaftar');
                break;
            case '1':
                return redirect()->action('\App\Http\Controllers\PendaftarController@pengumuman');
                break;   
            case '2':
                $title = 'Calon Siswa Gugur';
                $id =  Auth::user()->id;
                $user = User::where('id', $id)->get();
                $biodata = DB::table('biodata')->where('user_id', $id)->first();
                $berkas = DB::table('biodata')->where('user_id', $id)->value('seleksi_berkas');
                $pertama = DB::table('biodata')->where('user_id', $id)->value('seleksi_pertama');
                $kedua = DB::table('biodata')->where('user_id', $id)->value('seleksi_kedua');

                if (Peserta::where('user_id', $id)->exists()) {
                    return view('user.gugur', compact('title', 'user', 'biodata'));

                }else{
                    if(!empty($kedua)){

                        return view('user.gugur3', compact('title', 'user', 'biodata'));
                    } else if (!empty($pertama)){
                        $check = DB::table('penilaian_challenge')
                            ->where('user_id', $id)
                            ->value('total');
                        if($check == 0){
                            return view('user.gugur', compact('title', 'user', 'biodata'));
                        }else{
                            $ranking = Penilaian::where('total','!=' , 0)->orderBy('total', 'DESC')->get();
                            $nilai = DB::table('penilaian_challenge')->where('user_id', $id)->first();
                            return view('user.gugur2', compact('title', 'user', 'ranking','nilai'));
                        }
                    } else {
                        return view('user.gugur', compact('title', 'user', 'biodata'));
                    }
                }
                
                
                
                        
                break;
            case '3':
                $title = 'Calon Siswa Gagal Daftar';
                $id =  Auth::user()->id;
                $user = DB::table('users')->where('id', $id)->first();
    
                return view('user.gagaldaftar', compact('title', 'user'));
                            
                break;
            case '4':
                return redirect()->action('\App\Http\Controllers\PesertaController@index');
                                
                break;
            case '5':
                return redirect()->action('\App\Http\Controllers\FasilController@pengumuman');
                                
                break;    
                default:
                echo "SLP INDONESIA";
                break;
        }        
    }
}
