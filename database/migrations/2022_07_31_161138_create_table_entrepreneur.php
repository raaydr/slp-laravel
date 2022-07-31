<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEntrepreneur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_entrepreneur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->text('entrepreneur');
            $table->text('keterangan');
            $table->string('target_tugas');
            $table->integer('target_tugasID');
            $table->string('profit');
            $table->string('sumber_produk');
            $table->string('jenis_produk');
            $table->text('note')->nullable();
            $table->boolean('valid');
            $table->integer('user_id');
            $table->integer('gen');
            $table->integer('check_id')->nullable();
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
        Schema::dropIfExists('tugas_entrepreneur');
    }
}
