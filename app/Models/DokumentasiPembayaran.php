<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumentasiPembayaran extends Model
{
    protected $table = 'dokumentasi_pembayaran';
    use HasFactory;
    public function Laporan()
	{
		return $this->belongsTo('App\Models\Laporan');
	}
    protected $fillable = [
        'judul',
        'pembayaran',
        'url_foto',
        'laporan_id',
        'status',

        
        
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
        


    ]; 
}
