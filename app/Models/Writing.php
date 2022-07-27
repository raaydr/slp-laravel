<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    protected $table = 'tugas_writing';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	}
    protected $fillable = [
        'judul',
        'writing',
        'keterangan',
        'target_tugasID',
        'kelompok_writing',
        'note',
        'valid',
        'user_id',

        
        
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
        


    ];
}
