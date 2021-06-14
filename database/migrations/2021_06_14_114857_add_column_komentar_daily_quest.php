<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKomentarDailyQuest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_quest', function($table) {
            $table->LongText('komentar_video')->nullable();
            $table->LongText('komentar_writing')->nullable();
            $table->LongText('komentar_business')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_quest', function($table) {
            $table->dropColumn('komentar_video');
            $table->dropColumn('komentar_writing');
            $table->dropColumn('komentar_business');
        });
    }
}
