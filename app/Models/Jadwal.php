<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    use HasFactory;
    protected $fillable = [
        'awal',
        'akhir',
        'tanggal',
        'time_start',
        'time_end',
        'status',

        
        
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
        


    ];
}
