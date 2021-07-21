<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NomorSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('nomor_surat', function(Blueprint $table){
            $table->increments('id_no');
            $table->integer('id_desa')->unsigned();
            $table->integer('id_jenissurat')->unsigned();
            $table->integer('no_surat');
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
       Schema::dropIfExists('nomor_surat');
    }
}