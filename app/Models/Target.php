<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Target extends Model
{
    use HasFactory;
    protected $table = 'target_tugas';
    protected $fillable = [
        'judul',
        'keterangan',
        'jumlah',
        'tipe_tugas',
        'mulai',
        'gen',
        
        
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
        
        
        


    ];
   
}
