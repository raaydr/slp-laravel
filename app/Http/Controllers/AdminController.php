<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Biodata;
use App\Models\seleksiPertama;

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
    public function coba()
    {
        $title = 'coba Admin';
        $users = User::where('level', 1)->get();

        return view('admin.coba', compact('title', 'users'));
    }

    public function index()
    {
        $title = 'Dashboard Admin';
        $users = User::where('level', 1)->get();

        return view('admin.dashboard', compact('title', 'users'));
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
        
        //$users = User::where('user_id', $user_id)->first();
        $users=User::find($user_id)->biodata;
        $seleksiPertama=User::find($user_id)->seleksiPertama;
        $pdf=User::find($user_id)->userPDF;

        return view('admin.userProfile', compact('title', 'users','seleksiPertama','pdf'));
    }

    public function seleksi1_lulus($user_id)
    {
        $title = 'Admin User Profile';
        
        User::where('id', $user_id)->update(['level' => '1']);
        Biodata::where('id', $user_id)->update(['seleksi_berkas' => 'LULUS']);
        $users=User::find($user_id)->biodata;
        $seleksiPertama=User::find($user_id)->seleksiPertama;
        $pdf=User::find($user_id)->userPDF;
        return view('admin.userProfile', compact('title', 'users','seleksiPertama','pdf'));
        //return view('admin\userProfile')->with(compact('title', 'users','seleksiPertama','pdf'))->with('lulus','Pendaftar Lulus Tahap Pemberkasan');
    }

    public function seleksi1_gagal($user_id)
    {
        $title = 'Admin User Profile';
        
        User::where('id', $user_id)->update(['level' => '2']);
        Biodata::where('id', $user_id)->update(['seleksi_berkas' => 'GAGAL']);

        $users=User::find($user_id)->biodata;
        $seleksiPertama=User::find($user_id)->seleksiPertama;
        $pdf=User::find($user_id)->userPDF;
        return view('admin.userProfile', compact('title', 'users','seleksiPertama','pdf'));
        //return view('admin\userProfile')->with(compact('title', 'users','seleksiPertama','pdf'))->with('gagal','Pendaftar Gagal Tahap Pemberkasan');
    }

    public function seleksi2_lulus($user_id)
    {
        $title = 'Admin User Profile';
        
        User::where('id', $user_id)->update(['level' => '1']);
        Biodata::where('id', $user_id)->update(['seleksi_pertama' => 'LULUS']);
        $users=User::find($user_id)->biodata;
        $seleksiPertama=User::find($user_id)->seleksiPertama;
        $pdf=User::find($user_id)->userPDF;
        return view('admin.userProfile', compact('title', 'users','seleksiPertama','pdf'));
        //return view('admin\userProfile')->with(compact('title', 'users','seleksiPertama','pdf'))->with('lulus','Pendaftar Lulus Tahap Pemberkasan');
    }

    public function seleksi2_gagal($user_id)
    {
        $title = 'Admin User Profile';
        
        User::where('id', $user_id)->update(['level' => '2']);
        Biodata::where('id', $user_id)->update(['seleksi_pertama' => 'GAGAL']);

        $users=User::find($user_id)->biodata;
        $seleksiPertama=User::find($user_id)->seleksiPertama;
        $pdf=User::find($user_id)->userPDF;
        return view('admin.userProfile', compact('title', 'users','seleksiPertama','pdf'));
        //return view('admin\userProfile')->with(compact('title', 'users','seleksiPertama','pdf'))->with('gagal','Pendaftar Gagal Tahap Pemberkasan');
    }
}
