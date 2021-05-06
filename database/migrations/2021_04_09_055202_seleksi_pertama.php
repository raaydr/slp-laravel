<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeleksiPertama extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('seleksiPertama', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->text('url_cv');
            $table->text('url_writing');
            $table->text('url_video');
            $table->text('url_Business');
            $table->string('mentoring');
            $table->string('mentoring_rutin');
            $table->longText('futur');
            $table->longText('faith');
            $table->longText('ethic');
            $table->longText('question1');
            $table->longText('question2');
            $table->longText('question3');
            $table->longText('question4');
            $table->enum('organisasi', ['Pernah', 'Belum pernah']);
            $table->longText('aktif_organisasi')->nullable();
            $table->longText('question5');
            $table->longText('question6');
            $table->longText('question7');
            $table->longText('entrepreneurship');
            $table->longText('alasan_wirausaha');
            $table->enum('pernah_wirausaha', ['Pernah', 'Belum pernah']);
            $table->longText('exp_wirausaha')->nullable();
            $table->string('omset');
            $table->timestamps();
            $table->boolean('checked')->nullable();
            $table->string('checkedby')->nullable();
            
            
            $table->integer('user_id')->unsigned();   
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
