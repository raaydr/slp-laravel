<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilRecord extends Model
{
    protected $table = 'fasil_record';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	}  
}
