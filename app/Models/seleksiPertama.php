<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seleksiPertama extends Model
{
    protected $fillable = ['id', 'nama', 'url_cv', ];
    protected $table = 'seleksiPertama';
    
    public function allData(){

        return DB::table('seleksiPertama')->get();
    }

    public function addData ($data){

        DB::table('seleksiPertama')->insert($data);
    }

    public function User()
	{
		return $this->belongsTo('App\Models\User');
	}  	
}
