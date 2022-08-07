<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AddControl extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('control')->insert([
            'nama'=>'pendaftaran',
            'boolean'=> FALSE,

        ]);
        DB::table('control')->insert([
            'nama'=>'quest',
            'integer'=> 1,

        ]);
        DB::table('control')->insert([
            'nama'=>'seleksiPertama',
            'boolean'=> FALSE,

        ]);
        DB::table('control')->insert([
            'nama'=>'gen',
            'integer'=> 1,

        ]);
        DB::table('control')->insert([
            'nama'=>'interview',
            'integer'=> 1,

        ]);
    }
}
