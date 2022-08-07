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


class TargetController extends Controller
{
    //
    public function TargetTugasWriting($id)
    {
        $title = 'Tugas Writing';
        $user = User::where('id', $id)->first();
        $gen = $user->gen;
        $user_id = $id;
        $biodata = DB::table('users')
            ->where('id', $id)
            ->get();
        $target = Target::where('gen', $gen)->where('status', 1)->where('tipe_tugas', "Creative Writing")->orderBy('mulai', 'ASC')->get();
        $jumlah=count($target);
        for ($i = 0; $i <= $jumlah-1; $i++) {
            $tanggal = $target[$i]['mulai'];
            $tanggal = Carbon::parse($tanggal)->isoFormat('D MMMM Y');
            $target[$i]['mulai']= $tanggal;
        }
        return view('peserta.TargetTugasWriting', compact('target'));
    }
    public function TargetTugasSpeaking($id)
    {
        $user = User::where('id', $id)->first();
        $gen = $user->gen;
        $user_id = $id;
        $target = Target::where('gen', $gen)->where('status', 1)->where('tipe_tugas', "Public Speaking")->orderBy('mulai', 'ASC')->get();
        $jumlah=count($target);
        for ($i = 0; $i <= $jumlah-1; $i++) {
            $tanggal = $target[$i]['mulai'];
            $tanggal = Carbon::parse($tanggal)->isoFormat('D MMMM Y');
            $target[$i]['mulai']= $tanggal;
        }
        return view('peserta.TargetTugasSpeaking', compact('target'));
    }
    public function TargetTugasEntrepreneur($id)
    {
        $user = User::where('id', $id)->first();
        $gen = $user->gen;
        $user_id = $id;
        $biodata = DB::table('users')
            ->where('id', $id)
            ->get();
        $target = Target::where('gen', $gen)->where('status', 1)->where('tipe_tugas', "Entrepreneur")->orderBy('mulai', 'ASC')->get();
        $jumlah=count($target);
        for ($i = 0; $i <= $jumlah-1; $i++) {
            $tanggal = $target[$i]['mulai'];
            $tanggal = Carbon::parse($tanggal)->isoFormat('D MMMM Y');
            $target[$i]['mulai']= $tanggal;
        }
        return view('peserta.TargetTugasEntrepreneur', compact('target'));
    }

    public function inputTugasWriting($id)
    {
        $target = Target::where('id', $id)-> first();
        $mulai = $target->mulai;
        
        $now = Carbon::now(); // today
        
        if ($now <= $mulai ) {
            $start = 0;
          } else {
            $start = 1;
          }
        
        
        return view('peserta.inputTugasWriting', compact('target','start'));
    }

    public function inputTugasSpeaking($id){
        $target = Target::where('id', $id)-> first();
        $mulai = $target->mulai;
        
        $now = Carbon::now(); // today
        
        if ($now <= $mulai ) {
            $start = 0;
          } else {
            $start = 1;
          }

        return view('peserta.inputTugasSpeaking', compact('target','start'));
    }
    public function inputTugasEntrepreneur($id){
        $target = Target::where('id', $id)-> first();
        $mulai = $target->mulai;
        
        $now = Carbon::now(); // today
        
        if ($now <= $mulai ) {
            $start = 0;
          } else {
            $start = 1;
          }

        return view('peserta.inputTugasEntrepreneur', compact('target','start'));
    }

}
