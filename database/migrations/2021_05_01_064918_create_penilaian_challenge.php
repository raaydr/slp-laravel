<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianChallenge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_challenge', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gen');
            $table->string('nama');
            
            $table->integer('user_id')->unsigned()->unique();   
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            
            $table->Integer('writing')->unsigned();
            $table->Integer('video')->unsigned();
            $table->Integer('business')->unsigned();
            $table->Integer('total')->unsigned();
            $table->string('penjualan');
            $table->integer('point');
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
        Schema::dropIfExists('penilaian_challenge');
    }
}
