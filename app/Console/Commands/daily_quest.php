<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use App\Models\Quest;
use App\Models\User;
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
        $users = User::where('level', 4)->get();
        $hari = DB::table('control')
            ->where('id', 2)
            ->value('integer');
        $jumlah=count($users);
        for ($i = 0; $i <= $jumlah-1; $i++) {
            $user_id = $users[$i]['id'];
            $email = $users[$i]['email'];
            $quest = new Quest;
            $quest->user_id = $user_id;
            $quest->day = $hari;
            $quest->video = "belum mengerjakan";
            $quest->writing = "belum mengerjakan";
            $quest->business = "belum mengerjakan";
            $quest->sumber_produk = "kosong";
            $quest->jenis_produk = "kosong";
            $quest->keterangan = "kosong";
            $quest->hasil = 0;
            $quest->status = 0;
            $quest->video_check = 0;
            $quest->writing_check = 0;
            $quest->business_check = 0;
            $quest->save();
            

          }
    }
}
