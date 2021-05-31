<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataGambarTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_gambar_tanah', function (Blueprint $table) {
            $table->id();
            $table->integer('id_data_tanah');
            $table->string('gambar_denah_tanah');
            $table->string('gambar_sertifikat_tanah');
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
        Schema::dropIfExists('data_gambar_tanah');
    }
}
