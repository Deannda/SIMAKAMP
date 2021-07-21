<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratPenghasilan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_penghasilan', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->bigInteger('nik')->unsigned();
            $table->date('tanggal_surat');
            $table->text('jumlah_penghasilan');
            $table->bigInteger('saksi1');
            $table->bigInteger('saksi2');
            $table->bigInteger('saksi3');
            $table->text('sebagai3');
            $table->bigInteger('saksi4');
            $table->text('sebagai4');
            $table->bigInteger('mengetahui');
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
          Schema::dropIfExists('surat_penghasilan');
    }
}
