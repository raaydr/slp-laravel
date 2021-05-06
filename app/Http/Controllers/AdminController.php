<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Biodata;
use App\Models\seleksiPertama;
use App\Models\Penilaian;
use App\Models\Antrian;
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
    public function coba()
    {
        $title = 'coba Admin';
        $users = User::where('level', 1)->get();

        return view('admin.coba', compact('title', 'users'));
    }

    public function index()
    {
        $title = 'Dashboard Admin';
        $users = User::where('level', 1)->where('gen', 2)->orderBy('id', 'ASC')->get();

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
        $id= $user_id;
        $users=User::find($user_id)->biodata;
        $seleksiPertama=User::find($user_id)->seleksiPertama;
        //$penilaian=User::find($user_id)->penilaian_challenge;
        $penilaian = DB::table('penilaian_challenge')
        ->where('user_id', $id)
        ->first();

        return view('admin.userProfile', compact('title', 'users','seleksiPertama','id','penilaian'));
    }

    public function seleksi1_lulus($user_id)
    {
        $title = 'Admin User Profile';
        
        User::where('id', $user_id)->update(['level' => '1']);
        Biodata::where('user_id', $user_id)->update(['seleksi_berkas' => 'LULUS']);
        $users=User::find($user_id)->biodata;
        $seleksiPertama=User::find($user_id)->seleksiPertama;
        $pdf=User::find($user_id)->userPDF;
        return redirect()->route('admin.userprofile', [$user_id]);
        //return view('admin.userProfile', compact('title', 'users','seleksiPertama','pdf'));
        //return view('admin\userProfile')->with(compact('title', 'users','seleksiPertama','pdf'))->with('lulus','Pendaftar Lulus Tahap Pemberkasan');
    }

    public function seleksi1_gagal($user_id)
    {
        $title = 'Admin User Profile';
        
        User::where('id', $user_id)->update(['level' => '2']);
        Biodata::where('user_id', $user_id)->update(['seleksi_berkas' => 'GAGAL']);

        $users=User::find($user_id)->biodata;
        $seleksiPertama=User::find($user_id)->seleksiPertama;
        $pdf=User::find($user_id)->userPDF;
        return redirect()->route('admin.userprofile', [$user_id]);
        //return view('admin.userProfile', compact('title', 'users','seleksiPertama','pdf'));
        //return view('admin\userProfile')->with(compact('title', 'users','seleksiPertama','pdf'))->with('gagal','Pendaftar Gagal Tahap Pemberkasan');
    }

    public function seleksi2_lulus($user_id)
    {
        $title = 'Admin User Profile';

        $penilaian = DB::table('penilaian_challenge')
            ->where('user_id', $user_id)
            ->value('id');
        if (!empty($penilaian)){
            User::where('id', $user_id)->update(['level' => '1']);
        Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'LULUS']);
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
            $antrian_interview->save();
            DB::table('controller')->where('id',1)->update([            
                'antrian'=> $antrian,
                'updated_at'=> now(),
                        
            ]);
            return redirect()->route('admin.userprofile', [$user_id])->with('challenge', 'berhasil meluluskan');

        }else {
            return redirect()->route('admin.userprofile', [$user_id])->with('challengeerror', 'Isi Penilaian terlebih dahulu');
        }
        
        //return view('admin.userProfile', compact('title', 'users','seleksiPertama','pdf'));
        //return view('admin\userProfile')->with(compact('title', 'users','seleksiPertama','pdf'))->with('lulus','Pendaftar Lulus Tahap Pemberkasan');
    }

    public function seleksi2_gagal($user_id)
    {
        $title = 'Admin User Profile';

        $penilaian = DB::table('penilaian_challenge')
            ->where('user_id', $user_id)
            ->value('id');

        if (!empty($penilaian)){
            User::where('id', $user_id)->update(['level' => '2']);
            Biodata::where('user_id', $user_id)->update(['seleksi_pertama' => 'GAGAL']);

            
            $users=User::find($user_id)->biodata;
            $seleksiPertama=User::find($user_id)->seleksiPertama;
            $pdf=User::find($user_id)->userPDF;
            return redirect()->route('admin.userprofile', [$user_id])->with('challenge', 'berhasil menggagalkan');

        }else {
            $penilaian_challenge = new Penilaian;
            $penilaian_challenge->user_id = $user_id;
            $penilaian_challenge->writing = 0;
            $penilaian_challenge->video = 0;
            $penilaian_challenge->business = 0;
            $penilaian_challenge->total = 0;
            $penilaian_challenge->penjualan = 0;
            $penilaian_challenge->save();
            return redirect()->route('admin.userprofile', [$user_id])->with('challenge', 'berhasil menggagalkan');
        }
        
        //return view('admin.userProfile', compact('title', 'users','seleksiPertama','pdf'));
        //return view('admin\userProfile')->with(compact('title', 'users','seleksiPertama','pdf'))->with('gagal','Pendaftar Gagal Tahap Pemberkasan');
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
        $nbusiness = Input::get('penjualan');
        $business = ($nbusiness / 500000) *100;
        $total = $writing + $video + $business;
        if((($writing<=100)&&($video<=100)== true)){
            $penilaian_challenge = new Penilaian;
            $penilaian_challenge->user_id = Input::get('user_id');
            $penilaian_challenge->writing = Input::get('writing');
            $penilaian_challenge->video = Input::get('video');
            $penilaian_challenge->business = $business;
            $penilaian_challenge->total = $total;
            $penilaian_challenge->penjualan = Input::get('penjualan');
            $penilaian_challenge->save();
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
        

        $penilaian_challenge = new Penilaian;
        $user_id = Input::get('user_id');
        $writing = Input::get('writing');
        $video = Input::get('video');
        
        
        
        
        if((($writing<=100)&& ($video<=100)== true)){
            $nbusiness = Input::get('penjualan');
            $business = ($nbusiness / 500000) *100;
            $total = $writing + $video + $business;
            DB::table('penilaian_challenge')->where('user_id',$user_id)->update([
                'writing'=> $request->writing,
                'video' => $request->video,
                'business' => $business,
                'total'=> $total,
                'penjualan' => $request->penjualan,
                'updated_at'=> now(),
            ]);
            return redirect()->route('admin.userprofile', [$user_id])->with('berhasil', 'berhasil ubah penilaian');
        }else{
            return redirect()->route('admin.userprofile', [$user_id])->with('pesan', 'Penilaian melebihi yang seharusnya');
        }
        
        
    

    }
}
