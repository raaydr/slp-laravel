<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelBuktiPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasi_pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->text('keterangan');
            $table->integer('pembayaran');
            $table->text('url_foto');
            $table->integer('laporan_id');
            $table->boolean('status');
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
        Schema::dropIfExists('dokumentasi_pembayaran');
    }
}
