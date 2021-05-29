<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProfilFasil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasil', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->string('phonenumber');
            $table->string('instagram');
            $table->longText('prestasi');
            $table->string('quotes');
            $table->boolean('status');
            $table->text('url_foto');
            $table->integer('grup')->nullable();
            $table->integer('user_id')->unsigned();   
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('fasil');
    }
}
