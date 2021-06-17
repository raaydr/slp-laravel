<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFasilRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasil_record', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->boolean('status');
            $table->boolean('valid');
            $table->date('awal');
            $table->date('akhir')->nullable();
            $table->integer('grup');
            $table->integer('gen');
            
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
        Schema::dropIfExists('fasil_record');
    }
}
