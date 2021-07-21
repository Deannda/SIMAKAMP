<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataPendidikanterakhir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('data_pendidikanterakhir', function(Blueprint $table){
            $table->increments('id_pendidikanterakhir');
            $table->text('pendidikanterakhir');
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
       Schema::dropIfExists('data_pendidikanterakhir');
    }
}

