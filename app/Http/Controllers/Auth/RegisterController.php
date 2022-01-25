<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Biodata;
use App\Models\seleksiPertama;
use App\Models\userPDF;
use Illuminate\Support\Facades\Input;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm()
    {
        $pendaftaran = DB::table('control')
            ->where('nama', 'pendaftaran')
            ->value('boolean');

        return view('auth.register', compact('pendaftaran')
        );
    }
      /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), 
        [   
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'domisili' => 'required',
            'alamat_domisili' => 'required|string',
            'phonenumber' => 'required|numeric|digits_between:12,13',
            
            'aktivitas' => 'required',
            'minatprogram' => 'required',
            'alasanBeasiswa' => 'required|string',
            'five_pros' => 'required|string',
            'five_cons' => 'required|string',
            'url_foto' => 'required|mimes:jpeg,png,jpg|max:2048',
            'g-recaptcha-response' => 'required|captcha',
            

        ],

        $messages = 
        [
            'nama.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'E-Mail tidak boleh kosong !',
            'password.required' => 'Password tidak boleh kosong',
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
        
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        //Table Users
        $user = new User;
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->level = 1;
        $user->gen = $gen;
        $user->save();

        //Table seleksiPertama
        $user_id = $user->id;
        $seleksiPertama = new seleksiPertama;
        $seleksiPertama->user_id = $user_id;
        $seleksiPertama->url_cv = '#';
        $seleksiPertama->url_writing = '#';
        $seleksiPertama->url_video = '#';
        $seleksiPertama->url_Business = '#';
        $seleksiPertama->mentoring = 'Tolong diisi';
        $seleksiPertama->mentoring_rutin = 'Tolong diisi';
        $seleksiPertama->futur = 'Tolong diisi';
        $seleksiPertama->faith = 'Tolong diisi';
        $seleksiPertama->ethic = 'Tolong diisi';
        $seleksiPertama->question1 = 'Tolong diisi';
        $seleksiPertama->question2 = 'Tolong diisi';
        $seleksiPertama->question3 = 'Tolong diisi';
        $seleksiPertama->question4 = 'Tolong diisi';
        $seleksiPertama->organisasi = 'Belum pernah';
        $seleksiPertama->aktif_organisasi = 'Belum pernah';
        $seleksiPertama->question5 = 'Tolong diisi';
        $seleksiPertama->question6 = 'Tolong diisi';
        $seleksiPertama->question7 = 'Tolong diisi';
        $seleksiPertama->entrepreneurship = 'Tolong diisi';
        $seleksiPertama->alasan_wirausaha = 'Tolong diisi';
        $seleksiPertama->pernah_wirausaha = 'Belum pernah';
        $seleksiPertama->exp_wirausaha = 'Belum pernah';
        $seleksiPertama->omset = 'Tolong diisi';
        $seleksiPertama->nama = Input::get('nama');
        $seleksiPertama->save();

       

        //Table Biodata 
        $user_id = $user->id;
        $biodata = new Biodata;
        $biodata->user_id = $user_id;
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
            $namaFile = $user->id;
            $file = $request->file('url_foto') ;
            $fileName = $namaFile.'_'.$file->getClientOriginalName() ;
            $destinationPath = public_path().'/imgdaftar/' ;
            $file->move($destinationPath,$fileName);
            $biodata->url_foto = $fileName ;
        }
        $biodata->save();
        
        
        return redirect('/login')->with('success', 'Registrasi Anda telah berhasil!. Silakan login dengan menggunakan email dan password Anda.');
    }
    
}
