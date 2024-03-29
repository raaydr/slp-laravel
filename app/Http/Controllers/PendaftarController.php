<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Biodata;
use App\Models\Seleksi1;
use App\Models\seleksiPertama;
use App\Models\Penilaian;
use App\Models\Antrian;
use App\Models\Kepribadian;
use App\Models\Alur;
use App\Models\Interview;
use App\Models\Jadwal;
use App\Models\Challenge;
use Illuminate\Support\Facades\Input;
use App\Rules\MatchOldPassword;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use Redirect;
use Carbon\Carbon;

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
        $seleksiPertama = User::find($id)->seleksiPertama;
        $data = Alur::where('status', 1)->orderBy('urutan', 'ASC')->get();
        return view('user.dashboard', compact('title', 'user', 'biodata', 'seleksiPertama','data'));
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
        $seleksi_pertama = DB::table('control')
            ->where('nama', 'seleksiPertama')
            ->value('boolean');
        $rule = Challenge::where('status', 1)->orderBy('created_at', 'ASC')->get();
        $check = $biodata->seleksi_berkas ;
        if ($check == "LULUS"){

            if(seleksiPertama::where('user_id', $id)->exists()){
                $data = seleksiPertama::where('user_id', $id)->first();
            
                
            }

            return view('user.seleksi1', compact('title', 'biodata', 'user', 'seleksi','seleksi_pertama','rule','data'));
        } else {
            $title = 'Pengumuman Calon Siswa';
            return view('user.pengumuman', compact('title', 'user', 'biodata'));
        }
        
    }
    public function seleksi2()
    {
        $title = 'Seleksi Kedua Calon Siswa';
        $id = Auth::user()->id;
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();

        return view('user.seleksi2', compact('title', 'biodata', 'user'));
    }

    public function seleksiPertama(Request $request)
    {
        $seleksi_1 = new seleksiPertama;

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
        $id = $request->id;
        $cvpdf = DB::table('seleksiPertama')
            ->where('user_id', $id)
            ->value('url_cv');
        File::delete('cvPDF/' . $cvpdf);
        $fotobukti = DB::table('seleksiPertama')
            ->where('user_id', $id)
            ->value('url_Business');
        File::delete('imgPembelian/' . $fotobukti);

        if ($pdf = $request->hasFile('url_cv')) {
            $namaPdf = $request->nama;
            $pdf = $request->file('url_cv');
            $PDFName = $namaPdf . '_' . time() . '.' . $pdf->getClientOriginalName();
            $PDFName = preg_replace("/\s+/", "", $PDFName);
            $lokasiPath = public_path() . '/cvPDF/';
            $pdf->move($lokasiPath, $PDFName);
        }
        if ($gambar = $request->hasFile('url_Business')) {
            $namaGambar = $request->nama;
            $gambar = $request->file('url_Business');
            $GambarName = $namaGambar . '_' . time() . '.' . $gambar->getClientOriginalName();
            $GambarName = preg_replace("/\s+/", "", $GambarName);
            $tujuanPath = public_path() . '/imgPembelian/';
            $gambar->move($tujuanPath, $GambarName);
        }

        $update['url_cv'] = $PDFName;
        $update['url_writing'] = $request->url_writing;
        $update['url_video'] =  $request->url_video;
        $update['url_Business'] = $GambarName;
        $update['mentoring'] = $request->mentoring;
        $update['mentoring_rutin'] = $request->mentoring_rutin;
        $update['futur'] = $request->futur;
        $update['faith'] = $request->faith;
        $update['ethic'] = $request->ethic;
        $update['question1'] = $request->question1;
        $update['question2'] = $request->question2;
        $update['question3'] = $request->question3;
        $update['question4'] = $request->question4;
        $update['organisasi'] = $request->organisasi;
        $update['aktif_organisasi'] = $request->aktif_organisasi;
        $update['question5'] = $request->question5;
        $update['question6'] = $request->question6;
        $update['entrepreneurship'] = $request->entrepreneurship;
        $update['alasan_wirausaha'] = $request->alasan_wirausaha;
        $update['exp_wirausaha'] = $request->exp_wirausaha;
        $update['pernah_wirausaha'] = $request->pernah_wirausaha;
        $update['omset'] = $request->omset;

        seleksiPertama::updateOrInsert(
            ['user_id' => $id], $update
        );
        

        return Redirect::back()->with('pesan','Terima Kasih telah mengisi form Challenge');
        
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
        $id = $request->user_id;
        //Table Biodata
        $biodata = new Biodata();
        $biodata->user_id = $id;
        $biodata->nama = $request->nama;
        $biodata->email = $request->email;
        $biodata->jenis_kelamin = $request->jenis_kelamin;
        $biodata->tanggal_lahir = $request->tanggal_lahir;
        $biodata->domisili = $request->domisili;
        $biodata->alamat_domisili = $request->alamat_domisili;
        $biodata->phonenumber = $request->phonenumber;
        $biodata->aktivitas = $request->aktivitas;
        $biodata->minatprogram = $request->minatprogram;
        $biodata->alasanBeasiswa = $request->alasanBeasiswa;
        $biodata->five_pros = $request->five_pros;
        $biodata->five_cons = $request->five_cons;
        if ($file = $request->hasFile('url_foto')) {
            $namaFile = $id;
            $file = $request->file('url_foto');
            $fileName = $namaFile . '_' . $file->getClientOriginalName();
            $fileName = preg_replace("/\s+/", "", $fileName);
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
            $GambarName = preg_replace("/\s+/", "", $GambarName);
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

        return redirect('pendaftar/dashboard')->with('pesan', 'Berhasil update foto');
    }

    public function updatebiodata(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => '|string|max:255',

                
                'alamat_domisili' => 'string',
                'phonenumber' => 'max:13',

            
            ],

            $messages = [
              
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $title = 'Dashboard Calon Siswa';
        $id = Auth::user()->id;
            $profileBaru = array();
        
            if($request->nama != null){
                $nameNew = $request->nama;
                $profileBaru['nama'] = $nameNew;
            }
            
            if($request->jenis_kelamin != null){
                
                $profileBaru['jenis_kelamin'] = $request->jenis_kelamin;
            }
            if($request->tanggal_lahir != null){
                
                $profileBaru['tanggal_lahir'] = $request->tanggal_lahir;
            }
            if($request->domisili != null){
                
                $profileBaru['domisili'] = $request->domisili;
            }
            if($request->alamat_domisili != null){
                
                $profileBaru['alamat_domisili'] = $request->alamat_domisili;
            }
            if($request->aktivitas != null){
                
                $profileBaru['aktivitas'] = $request->aktivitas;
            }
            if($request->minatprogram != null){
                
                $profileBaru['minatprogram'] = $request->minatprogram;
            }
            if($request->alasanbeasiswa != null){
                
                $profileBaru['alasanbeasiswa'] = $request->alasanbeasiswa;
            }
            if($request->five_pros != null){
                
                $profileBaru['five_pros'] = $request->five_pros;
            }
            if($request->five_cons != null){
                
                $profileBaru['five_cons'] = $request->five_cons;
            }

            
            
            $profileBaru['updated_at'] = now();
            $profileBaru['edit'] = 0;
            
            
            Biodata::where('user_id', $id )->update($profileBaru);
            //dd($profileBaru);

            return redirect()->route('pendaftar.dashboard')->with('pesan', 'Berhasil ubah');
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

        if ($biodata->edit == 1){
            return view('user.editbiodata', compact('title', 'user', 'biodata'));
        }else{
            return redirect()->route('pendaftar.pengumuman');
        }
        
        
    }

    public function ranking()
    {
        $title = 'Dashboard Admin';
        $id = Auth::user()->id;
        $users = DB::table('users')
            ->where('id', $id)
            ->first();
        $biodata = DB::table('biodata')
            ->where('user_id', $id)
            ->first();
        $ranking = Penilaian::where('total', '!=', 0)->where('gen',$users->gen)
            ->orderBy('total', 'DESC')
            ->get();
        $nilai = DB::table('penilaian_challenge')
            ->where('user_id', $id)
            ->first();
        $kepribadian = DB::table('table_kepribadian')
            ->where('user_id', $id)
            ->first();
        $antrian = Antrian::where('user_id', $id)
            ->value('antrian');
        $absen = Antrian::where('user_id', $id)
            ->value('absen');
        $wawancara = Interview::where('id', 1)->first();
        $data = Jadwal::where('status', 1)->orderBy('awal', 'ASC')->get();
        $jumlah_data = count($data);
            for ($i = 0; $i <= $jumlah_data-1; $i++) {
                $awal = $data[$i]['awal'];
                $akhir = $data[$i]['akhir'];
                $id = $data[$i]['id'];
                $tanggal = $data[$i]['tanggal'];
                $time_start = $data[$i]['time_start'];
                $time_end = $data[$i]['time_end'];
                if (($awal <= $antrian) && ($antrian <= $akhir)){
                    $break = 0;
                

                    $jadwal = $time_start.'  s.d. '.$time_end;
                    $tanggal = Carbon::parse($tanggal)->isoFormat('D MMMM Y');
                    $waktu = $tanggal.', jam'.$jadwal;
                    break;
                } 
            }
        

        return view('user.rankingchallenge', compact('title', 'ranking', 'users', 'nilai', 'kepribadian','antrian','waktu','biodata','absen','wawancara'));
    }

    public function uploadKepribadian(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'url_kepribadian' => 'required|mimes:jpeg,png,jpg,pdf|max:5120',
            ],

            $messages = [
                'url_kepribadian.required' => 'Hasil Tes tidak boleh kosong!',
                'url_kepribadian.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png,pdf.',
                'url_kepribadian.max' => 'Ukuran file terlalu besar, maksimal file 5Mb !',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $id = Auth::user()->id;
        //Table seleksi_1
        

        $nama = DB::table('biodata')
            ->where('user_id', $id)
            ->value('nama');
        if (Kepribadian::where('user_id', $id)->exists()) {
            if ($gambar = $request->hasFile('url_kepribadian')) {
                $gambar = $request->file('url_kepribadian');
                $GambarName = $id . '_' . $gambar->getClientOriginalName();
                $GambarName = preg_replace("/\s+/", "", $GambarName);
                $tujuanPath = public_path() . '/teskepribadian/';
                $gambar->move($tujuanPath, $GambarName);
            }
            $foto = DB::table('table_kepribadian')
                ->where('user_id', $id)
                ->value('url_kepribadian');
            File::delete('teskepribadian/' . $foto);
            DB::table('table_kepribadian')
                ->where('user_id', $id)
                ->update([
                    'url_kepribadian' => $GambarName,
                    'updated_at' => now(),
                ]);
        } else {
            if ($gambar = $request->hasFile('url_kepribadian')) {
                $gambar = $request->file('url_kepribadian');
                $GambarName = $id . '_' . $gambar->getClientOriginalName();
                $GambarName = preg_replace("/\s+/", "", $GambarName);
                $tujuanPath = public_path() . '/teskepribadian/';
                $gambar->move($tujuanPath, $GambarName);
            }
            $test_kepribadian = new Kepribadian();
            $test_kepribadian->user_id = $id;
            $test_kepribadian->nama = $nama;
            $test_kepribadian->url_kepribadian = $GambarName;

            $test_kepribadian->save();
        }

        
        return redirect()->route('pendaftar.ranking.challenge')->with('pesan', 'Berhasil upload');
    }

    public function ubah_password(){
        $title = 'peserta ubah password';
        $id = Auth::user()->id;
        $biodata = DB::table('biodata')
        ->where('user_id', $id)
        ->first();

        return view('user.ubahpassword', compact('title','biodata'));
    }
    public function change_password(Request $request)

    {

        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

   

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

   
        return redirect()->route('pendaftar.ubah.password')->with('berhasil', 'berhasil ubah password');
        

    }
}
