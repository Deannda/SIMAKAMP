<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratKematian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_kematian', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->bigInteger('id_kk')->unsigned();
            $table->bigInteger('nik')->unsigned();
            $table->date('tanggal_surat');
            $table->date('tanggal_kematian');
            $table->text('tempat_kematian');
            $table->text('sebab');
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
          Schema::dropIfExists('surat_kematian');
    }
}
