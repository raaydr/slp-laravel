<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	}  	
}
