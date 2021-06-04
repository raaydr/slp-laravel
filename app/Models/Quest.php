<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $table = 'daily_quest';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	} 
}
