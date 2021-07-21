<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratKkn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_kkn', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->date('tanggal_surat');
            $table->text('kepada');
            $table->text('di');
            $table->text('proker');
            $table->text('tema');
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
          Schema::dropIfExists('surat_kkn');
    }
}

