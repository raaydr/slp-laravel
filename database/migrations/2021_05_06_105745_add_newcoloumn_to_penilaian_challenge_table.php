<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewcoloumnToPenilaianChallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penilaian_challenge', function (Blueprint $table) {
            //
            $table->integer('gen');
            $table->string('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penilaian_challenge', function (Blueprint $table) {
            //
            $table->integer('gen');
            $table->string('nama');
        });
    }
}
