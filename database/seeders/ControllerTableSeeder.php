<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ControllerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('controller')->insert([
            
            'antrian'=>0,
            'pengumuman'=>False,
            'gen'=>2,
            'pendaftaran'=>False,
            'seleksiPertama'=>False,

        ]);
    }
}
