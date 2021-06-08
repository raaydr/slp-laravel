<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTabelRecordPeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peserta', function($table) {
            $table->integer('video_clear');
            $table->integer('writing_clear');
            $table->integer('business_clear');
            $table->integer('hasil_clear');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peserta', function($table) {
            $table->dropColumn('video_clear');
            $table->dropColumn('writing_clear');
            $table->dropColumn('business_clear');
            $table->dropColumn('hasil_clear');

        });
    }
}
