<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewcoloumnToControllerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controller', function (Blueprint $table) {
            //
            $table->integer('gen');
            $table->Boolean('pendaftaran');
            $table->Boolean('seleksiPertama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controller', function (Blueprint $table) {
            //
            $table->integer('gen');
            $table->Boolean('pendaftaran');
            $table->Boolean('seleksiPertama');
        });
    }
}
