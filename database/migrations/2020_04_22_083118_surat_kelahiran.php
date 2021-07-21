<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratKelahiran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_kelahiran', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->date('tanggal_surat');
            $table->bigInteger('nik')->unsigned();
            $table->bigInteger('ayah')->unsigned();
            $table->bigInteger('ibu')->unsigned();
            $table->date('tanggal_lahir');
            $table->text('tempat_lahir');
            $table->text('anak');
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
          Schema::dropIfExists('surat_kelahiran');
    }
}