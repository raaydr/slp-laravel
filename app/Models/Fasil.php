<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasil extends Model
{
    protected $table = 'fasil';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	} 
}
