<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('data_desa', function(Blueprint $table){
            $table->increments('id_desa');
            $table->integer('id_kecamatan')->unsigned();
            $table->integer('id_kabupaten')->unsigned();
            $table->text('nama_desa');
            $table->text('alamat_desa');
            $table->text('kepala_desa');
            $table->integer('nip_kepala_desa');
            $table->integer('kode_pos');
            $table->text('kerani_desa');
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
          Schema::dropIfExists('data_desa');
    }
}
