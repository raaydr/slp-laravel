<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userPDF extends Model
{
   use HasFactory;
   protected $table = 'userpdf';
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	}
}
