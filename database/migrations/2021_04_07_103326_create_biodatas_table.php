<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->date('tanggal_lahir');
            $table->enum('domisili', ['Jakarta', 'Bogor', 'Depok', 'Tangerang', 'Bekasi', 'Lainnya']);
            $table->longText('alamat_domisili');
            $table->enum('aktivitas', ['Mahasiswa','Karyawan', 'Pengusaha', 'Pelajar', 'Yang lain']);
            $table->string('phonenumber');
            $table->text('url_foto');
            $table->string('minatprogram');
            $table->longText('alasanbeasiswa');
            $table->longText('five_pros');
            $table->longText('five_cons');
            $table->string('seleksi_berkas')->nullable();
            $table->string('seleksi_pertama')->nullable();
            $table->string('seleksi_kedua')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('biodata');
    }
}
