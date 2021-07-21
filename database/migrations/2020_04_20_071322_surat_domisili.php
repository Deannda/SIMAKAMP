<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratDomisili extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_domisili', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->bigInteger('nik')->unsigned();
            $table->date('tanggal_surat');
            $table->date('tanggal_domisili');
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
          Schema::dropIfExists('surat_domisili');
    }
}