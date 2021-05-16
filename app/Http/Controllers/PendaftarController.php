<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Biodata;
use App\Models\Seleksi1;
use App\Models\seleksiPertama;
use App\Models\Penilaian;
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
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();
        $seleksiPertama=User::find($id)->seleksiPertama;
        return view('user.dashboard', compact('title', 'user', 'biodata','seleksiPertama'));
    }
    public function pengumuman()
    {
        $title = 'Pengumuman Calon Siswa';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();        

        return view('user.pengumuman', compact('title', 'user', 'biodata'));
    }

    public function eliminasi()
    {
        $title = 'Calon Siswa Gugur';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();

        return view('user.gugur', compact('title', 'user', 'biodata'));
    }
    public function seleksi1()
    {
        $title = 'Seleksi Pertama Calon Siswa';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();
        $seleksi = DB::table('seleksiPertama')
            ->where('user_id', $id)
            ->value('checked');

        return view('user.seleksi1', compact('title','biodata', 'user', 'seleksi'));
    }

    public function seleksiPertama(Request $request)
    {
        $seleksi_1 = new seleksiPertama();

        $validator = Validator::make(
            $request->all(),
            [
                'url_cv' => 'required|mimes:pdf|max:10240',
                'url_writing' => 'required|string',
                'url_video' => 'required|string',
                'url_Business' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'mentoring' => 'required|string',
                'futur' => 'required|string',
                'faith' => 'required|string',
                'ethic' => 'required|string',
                'question1' => 'required|string',
                'question2' => 'required|string',
                'question3' => 'required|string',
                'question4' => 'required|string',
                'organisasi' => 'required|string',
                'question5' => 'required|string',
                'question6' => 'required|string',
                'entrepreneurship' => 'required|string',
                'alasan_wirausaha' => 'required|string',
                'pernah_wirausaha' => 'required|string',
                'omset' => 'required|string',

            ],

            $messages = [
                'url_cv.required' => 'Upload CV anda !',
                'url_cv.image' => 'Format file tidak mendukung! Gunakan pdf.',
                'url_cv.max' => 'Ukuran file terlalu besar, maksimal file 10Mb !',
                'url_writing.required' => 'tolong lengkapi !',
                'url_vide.required' => 'tolong lengkapi !',
                'url_Business.required' => 'foto tidak boleh kosong!',
                'url_Business.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png, pdf.',
                'url_Business.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',
                'mentoring.required' => 'tolong lengkapi !',
                'futur.required' => 'tolong lengkapi !',
                'faith.required' => 'tolong lengkapi !',
                'ethic.required' => 'tolong lengkapi !',
                'question1.required' => 'tolong lengkapi !',
                'question2.required' => 'tolong lengkapi !',
                'question3.required' => 'tolong lengkapi !',
                'question4.required' => 'tolong lengkapi !',
                'organisasi.required' => 'tolong lengkapi !',
                'question5.required' => 'tolong lengkapi !',
                'question6.required' => 'tolong lengkapi !',
                'entrepreneurship.required' => 'tolong lengkapi !',
                'alasan_wirausaha.required' => 'tolong lengkapi !',
                'pernah_wirausaha.required' => 'tolong lengkapi !',
                'omset.required' => 'tolong lengkapi !',

            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //Table seleksi_1
        $id = Input::get('id');
        $cvpdf = DB::table('seleksiPertama')
            ->where('user_id', $id)
            ->value('url_cv');
        File::delete('cvPDF/'.$cvpdf);
        $fotobukti = DB::table('seleksiPertama')
            ->where('user_id', $id)
            ->value('url_Business');
        File::delete('imgPembelian/'.$fotobukti);

        if ($pdf = $request->hasFile('url_cv')) {
            $namaPdf = Input::get('nama');
            $pdf = $request->file('url_cv');
            $PDFName = $namaPdf .'_'.time().'.'. $pdf->getClientOriginalName();
            $lokasiPath = public_path() . '/cvPDF/';
            $pdf->move($lokasiPath, $PDFName);
            
        }
        if ($gambar = $request->hasFile('url_Business')) {
            $namaGambar = Input::get('nama');
            $gambar = $request->file('url_Business');
            $GambarName = $namaGambar.'_'.time().'.'. $gambar->getClientOriginalName();
            $tujuanPath = public_path() . '/imgPembelian/';
            $gambar->move($tujuanPath, $GambarName);
            
        }
        
        
        DB::table('seleksiPertama')->where('user_id',$id)->update([
            'url_cv'=> $PDFName,
            'url_writing' => $request->url_writing,
            'url_video' => $request->url_video,
            'url_Business'=> $GambarName,
            'mentoring' => $request->mentoring,
            'mentoring_rutin' => $request->mentoring_rutin,
            'futur' => $request->futur,
            'faith' => $request->faith,
            'ethic' => $request->ethic,
            'question1' => $request->question1,
            'question2' => $request->question2,
            'question3' => $request->question3,
            'question4' => $request->question4,
            'organisasi' => $request->organisasi,
            'aktif_organisasi' => $request->aktif_organisasi,
            'question5' => $request->question5,
            'question6' => $request->question6,
            'entrepreneurship' => $request->entrepreneurship,
            'alasan_wirausaha' => $request->alasan_wirausaha,
            'pernah_wirausaha' => $request->pernah_wirausaha,
            'exp_wirausaha' => $request->exp_wirausaha,
            'omset' => $request->omset,
            'checked'=> '1',
            
            
        ]);
        

        return redirect('pendaftar/seleksi-pertama')->with('pesan', 'Terima Kasih telah mengisi form Challenge');
    }

    public function daftarUlang(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
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

            $messages = [
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
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $id = Input::get('user_id');
        //Table Biodata
        $biodata = new Biodata();
        $biodata->user_id = Input::get('user_id');
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
        if ($file = $request->hasFile('url_foto')) {
            $namaFile = Input::get('user_id');
            $file = $request->file('url_foto');
            $fileName = $namaFile . '_' . $file->getClientOriginalName();
            $destinationPath = public_path() . '/imgdaftar/';
            $file->move($destinationPath, $fileName);
            $biodata->url_foto = $fileName;
        }
        $biodata->save();

        User::where('id', $id)->update(['level' => '1']);

        $title = 'Dashboard Calon Siswa';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();

        return view('user.dashboard', compact('title', 'user', 'biodata'));
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
        File::delete('imgdaftar/'.$foto);
        DB::table('biodata')->where('user_id',$id)->update([            
            'url_foto'=> $GambarName,
            'updated_at'=> now(),
                    
        ]);
        

        return redirect('pendaftar/dashboard')->with('pesan','Berhasil update foto');  
    }

    public function updatebiodata(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
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
            ],

            $messages = [
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
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $title = 'Dashboard Calon Siswa';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();

        DB::table('biodata')->where('user_id',$id)->update([
                'nama'=> $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'domisili' => $request->domisili,
                'alamat_domisili' => $request->alamat_domisili,
                'aktivitas' => $request->aktivitas,
                'minatprogram' => $request->minatprogram,
                'alasanbeasiswa' => $request->alasanBeasiswa,
                'five_pros' => $request->five_pros,
                'five_cons' => $request->five_cons,
                
                
            ]);



        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();

        return view('user.dashboard', compact('title', 'user', 'biodata')); 
    }

    public function editbiodata(Request $request)
    {
        $title = 'Ubah Biodata';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();

        return view('user.editbiodata', compact('title', 'user', 'biodata'));
    }

    public function ranking()
    {
        $title = 'Dashboard Admin';
        $id = Auth::user()->id;
        $users = DB::table('users')
            ->where('id', $id)
            ->first();
            $ranking = Penilaian::where('total','!=' , 0)->orderBy('total', 'DESC')->get();


        return view('user.rankingchallenge', compact('title', 'ranking','users'));
    }
}
