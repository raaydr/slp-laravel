<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrepreneur extends Model
{
    protected $table = 'tugas_entrepreneur';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	}
    protected $fillable = [
        'judul',
        'entrepreneur',
        'keterangan',
        'target_tugas',
        'target_tugasID',
        'profit',
        'jenis_produk',
        'sumber_produk',
        'note',
        'valid',
        'user_id',
        'gen',
        'check_id',

        
        
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
        


    ];
}
