<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratKtp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_ktp', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->bigInteger('nik')->unsigned();
            $table->date('tanggal_surat');
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
          Schema::dropIfExists('surat_ktp');
    }
}