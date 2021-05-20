<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepribadian extends Model
{
    protected $table = 'table_kepribadian';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	}  
}
