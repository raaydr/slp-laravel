<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peserta')->update([
            'video_clear' => 0,
            'writing_clear' => 0,
            'business_clear' => 0,
            'hasil_clear' => 0,
         ]);
    }
}
