<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaking extends Model
{
    protected $table = 'tugas_speaking';
    use HasFactory;
    public function User()
	{
		return $this->belongsTo('App\Models\User');
	}
    protected $fillable = [
        'judul',
        'speaking',
        'keterangan',
        'target_tugas',
        'target_tugasID',
        'jumlah_peserta',
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
