<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratSitu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_situ', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->bigInteger('nik')->unsigned();
            $table->date('tanggal_surat');
            $table->text('lampiran');
            $table->text('alamat_usaha');
            $table->text('luas_usaha');
            $table->text('ttd');
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
          Schema::dropIfExists('surat_situ');
    }
}

