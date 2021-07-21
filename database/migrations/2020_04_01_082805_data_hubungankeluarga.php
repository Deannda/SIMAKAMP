<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataHubungankeluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('data_hubungankeluarga', function(Blueprint $table){
            $table->increments('id_hubungankeluarga');
            $table->text('hubungankeluarga');
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
       Schema::dropIfExists('data_hubungankeluarga');
    }
}

