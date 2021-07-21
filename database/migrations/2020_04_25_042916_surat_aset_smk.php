<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratAsetSmk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('surat_aset_smk', function(Blueprint $table){
            $table->increments('nomor_surat');
            $table->date('tanggal_surat');
            $table->text('isi_surat');
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
          Schema::dropIfExists('surat_aset_smk');
    }
}
