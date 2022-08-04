<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    public function Laporan()
	{
		return $this->belongsTo('App\Models\Laporan');
	}  
    protected $fillable = [
        'nama',
        'grup',
        'note',
        'absen',
        'user_id',
        'laporan_id',
        
        
        
        
        
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
