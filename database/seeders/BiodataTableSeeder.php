<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BiodataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('biodata')->insert([
            'nama'=>'admin',
            'email'=>'nimda@slpindonesia.com',
            'jenis_kelamin'=>'Pria',
            'tanggal_lahir'=>'1997-01-27',
            'domisili'=>'Jakarta',
            'alamat_domisili'=>'Jl.Tanah Dire Merdeka Radiant',
            'aktivitas'=>'Mahasiswa',
            'phonenumber'=>'0818180180',
            'url_foto'=>'-',
            'minatprogram'=>'webAndroid',
            'alasanbeasiswa'=>'-',
            'five_pros'=>'-',
            'five_cons'=>'-',
            'user_id'=>'1',

        ]);
    }
}
