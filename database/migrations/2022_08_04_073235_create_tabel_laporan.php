<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->date('tanggal_kegiatan');
            $table->string('time_start');
            $table->string('time_end');
            $table->string('tipe_kegiatan');
            $table->string('guest');
            $table->text('tempat');
            $table->text('keterangan')->nullable();
            $table->integer('gen');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
