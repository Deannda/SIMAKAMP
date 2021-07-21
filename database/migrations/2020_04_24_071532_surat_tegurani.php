<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratTegurani extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_tegurani', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->date('tanggal_surat');
            $table->text('lampiran');
            $table->text('kepada');
            $table->text('di');
            $table->text('dasar_teguran');
            $table->text('isi_teguran');
      
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
          Schema::dropIfExists('surat_tegurani');
    }
}