<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AddValueCheckSeleksiPertama extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('seleksiPertama')->update([
            'checked' => 0
         ]);
    }
}
