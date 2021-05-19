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
    }
}
