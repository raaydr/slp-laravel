<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class daily_quest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sg:daily-quest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat tugas harian';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $antrian = DB::table('controller')
        ->where('id', 1)
        ->value('antrian');
        $nantrian = $antrian + 1;
        DB::table('controller')->where('id',1)->update([
                
            'antrian' =>$nantrian,
            'updated_at'=> now(),
        ]);
    }
}
