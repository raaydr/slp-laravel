<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

class Seleksi1 extends Model
{   
    protected $fillable = ['id', 'nama', 'url_cv', ];
    public $seleksi_1= "seleksi_1";
    public function allData(){

        return DB::table('seleksi_1')->get();
    }

    public function addData ($data){

        DB::table('seleksi_1')->insert($data);
    }
}
