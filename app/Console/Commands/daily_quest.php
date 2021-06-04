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
        $run = DB::table('control')
        ->where('id', 2)
        ->value('boolean');
        if($run == 1){
            $quest = DB::table('control')
            ->where('id', 2)
            ->value('integer');
            $newquest = $quest + 1;
            DB::table('control')->where('id',2)->update([
                    
                'integer' =>$newquest,
                'updated_at'=> now(),
            ]);
        
            }
    }
}
