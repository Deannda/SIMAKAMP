<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratDispensasiNikah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_dispensasi_nikah', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->date('tanggal_surat');
            $table->text('lampiran');
            $table->text('sebagai1');
            $table->bigInteger('nik')->unsigned();
            $table->text('sebagai2');
            $table->text('nama');
            $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('warga');
            $table->text('agama');
            $table->text('status');
            $table->text('alamat');
            $table->text('keterangan');
            $table->date('tanggal_nikah');
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
          Schema::dropIfExists('surat_dispensasi_nikah');
    }
}