<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratPenguji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_penguji', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->date('tanggal_surat');
            $table->text('lampiran');
            $table->date('hari_tanggal');
            $table->text('waktu');
            $table->text('tempat');
            $table->text('periode');
            $table->bigInteger('nik')->unsigned();
            $table->text('keterangan1');
            $table->bigInteger('nik2')->unsigned();
            $table->text('keterangan2');
            $table->bigInteger('nik3')->unsigned();
            $table->text('keterangan3');
            $table->bigInteger('nik4')->unsigned();
            $table->text('keterangan4');
            $table->bigInteger('nik5')->unsigned();
            $table->text('keterangan5');
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
          Schema::dropIfExists('surat_penguji');
    }
}