<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataKk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('data_kk', function(Blueprint $table){
            $table->bigInteger('nik_kk')->primary();
            $table->integer('id_desa')->unsigned();
            $table->text('alamat');
            $table->integer('rt');
            $table->integer('rw');
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
          Schema::dropIfExists('data_kk');
    }
}
