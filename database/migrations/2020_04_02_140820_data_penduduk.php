<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataPenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('data_penduduk', function(Blueprint $table){
            $table->bigInteger('nik')->primary();
            $table->bigInteger('id_kk')->unsigned();
            $table->integer('id_desa')->unsigned();
            $table->text('nama');
            $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('jenis_kelamin')->unsigned();
            $table->integer('golongan_darah')->unsigned();
            $table->integer('agama')->unsigned();
            $table->integer('status_perkawinan')->unsigned();
            $table->integer('pendidikan')->unsigned();
            $table->integer('pekerjaan')->unsigned();
            $table->integer('hubungan_keluarga')->unsigned();
            $table->integer('kewarganegaraan')->unsigned();
            $table->text('ayah');
            $table->text('ibu');
            $table->text('keberadaan');
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
          Schema::dropIfExists('data_penduduk');
    }
}

