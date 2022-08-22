<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi_kegiatan';
    use HasFactory;
    public function Laporan()
	{
		return $this->belongsTo('App\Models\Laporan');
	}
    protected $fillable = [
        'url_foto',
        'url_foto',
        'laporan_id',
        'status',

        
        
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
        


    ]; 
}
