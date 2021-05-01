<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
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
                return redirect()->action('\App\Http\Controllers\AdminController@index');
                break;
            case '1':
                return redirect()->action('\App\Http\Controllers\PendaftarController@pengumuman');
                break;   
            case '2':
                $title = 'Calon Siswa Gugur';
                $id =  Auth::user()->id;
                $user = DB::table('users')->where('id', $id)->first();
                $biodata = DB::table('biodata')->where('user_id', $id)->first();

                return view('user.gugur', compact('title', 'user', 'biodata'));
                        
                break;
            case '3':
                $title = 'Calon Siswa Gagal Daftar';
                $id =  Auth::user()->id;
                $user = DB::table('users')->where('id', $id)->first();
    
                return view('user.gagaldaftar', compact('title', 'user'));
                            
                break;    
                default:
                echo "SLP INDONESIA";
                break;
        }        
    }
}
