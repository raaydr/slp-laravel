<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    
    protected $table = 'penilaian_challenge';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	} 
}
