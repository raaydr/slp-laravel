<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_tugas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('target');
            $table->string('jenis');
            $table->text('keterangan');
            $table->integer('jumlah');
            $table->integer('gen');
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
        Schema::dropIfExists('target_tugas');
    }
}
