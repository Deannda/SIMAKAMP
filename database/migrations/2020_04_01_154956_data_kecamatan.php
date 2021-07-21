<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataKecamatan extends Migration
   {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('data_kecamatan', function(Blueprint $table){
            $table->increments('id_kecamatan');
            $table->integer('id_kabupaten')->unsigned();
            $table->text('nama_kecamatan');
            $table->text('alamat_kecamatan');
            $table->integer('kode_pos');
            $table->text('nama_camat');
            $table->integer('nip');
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
          Schema::dropIfExists('data_kecamatan');
    }
}
