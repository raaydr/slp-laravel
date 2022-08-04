<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';
    protected $fillable = [
        'judul',
        'tanggal_kegiatan',
        'time_start',
        'time_end',
        'tipe_kegiatan',
        'guest',
        'tempat',
        'keterangan',
        'gen',
        'status',
        
        
        
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
        
        'time_start' => 'date:hh:mm',
        'time_end' => 'date:hh:mm',
        
        


    ];
}
