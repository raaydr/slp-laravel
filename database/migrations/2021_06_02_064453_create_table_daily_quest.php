<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDailyQuest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_quest', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hari')->unsigned();   
            $table->string('video')->nullable();
            $table->text('writing')->nullable();
            $table->text('url_bukti');
            $table->string('hasil');
            $table->LongText('note')->nullable();
            
            $table->boolean('status');
            $table->boolean('video_check');
            $table->boolean('writing_check');
            $table->boolean('business_check');
            
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
        Schema::dropIfExists('daily_quest');
    }
}
