<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratBelumNikah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_belum_nikah', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->date('tanggal_surat');
            $table->bigInteger('nik')->unsigned();
            $table->bigInteger('ayah');
            $table->bigInteger('ibu');
            $table->bigInteger('saksi1');
            $table->bigInteger('saksi2');
            $table->bigInteger('wali');
            $table->text('hubungan');
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
          Schema::dropIfExists('surat_belum_nikah');
    }
}