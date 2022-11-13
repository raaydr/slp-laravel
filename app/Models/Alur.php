<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alur extends Model
{
    protected $table = 'alur_pendaftaran';
    use HasFactory;
    protected $fillable = [
        'judul',
        'isi',
        'urutan',
        'status',
        'mulai',

        
        
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
        


    ];
}
