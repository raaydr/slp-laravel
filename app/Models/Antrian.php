<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrian_interview';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	}  
}
