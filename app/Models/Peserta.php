<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	} 

}
