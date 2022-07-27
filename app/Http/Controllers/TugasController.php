<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Biodata;
use App\Models\seleksiPertama;
use App\Models\Penilaian;
use App\Models\Control;
use App\Models\Antrian;
use App\Models\Peserta;
use App\Models\Fasil;
use App\Models\Quest;
use App\Models\Target;
use App\Models\Writing;
use App\Models\Jualan;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Input;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use DateTime;
use Carbon\Carbon;
use Redirect;

class TugasController extends Controller
{
    public function addTugasWriting (Request $request, $id){
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required|string',
                'kelompok_writing' => 'nullable|string|max:255',
                'keterangan' => 'required',
                'url_link' => 'nullable|regex:/([A-Z""])\w+/|max:255',
                'url_file' => 'mimes:doc,pdf,docx,zip,pdf|max:10240',
                
                
            ],

            $messages = [
                'judul.required' => 'judul tidak boleh kosong!',
                'keterangan.required' => 'awalan tidak boleh kosong!',
                
                
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $user_id = Auth::user()->id;

        $tugas = new Writing;
        $tugas->judul = $request->judul;
        $tugas->kelompok_writing = $request->kelompok_writing;
        $detail=$request->keterangan;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();
        $tugas->keterangan = $detail;
        $tugas->user_id = $user_id;
        $tugas->target_tugasID = $id;
        $tugas->valid = 0 ;
        if($request->hasFile('url_file')) 
            {
            $namaFile = $request->judul;
            $file = $request->file('url_file') ;
            $namaFile = $namaFile.'.'.$file->getClientOriginalExtension() ;
            $fileName = preg_replace("/\s+/", "", $namaFile);
            $destinationPath = public_path().'/writing/' ;
            $file->move($destinationPath,$fileName);
            $tugas->writing = $fileName ;
        }else{
            $tugas->writing = $request->url_link;
            
        }
        
        
        $tugas->save();
        
       return Redirect::back()->with('pesan','Pengisian Tugas Berhasil');

        
    }
}
