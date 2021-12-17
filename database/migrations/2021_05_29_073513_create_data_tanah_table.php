<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_tanah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->bigInteger('id_jenis_surat');
            $table->bigInteger('id_surat_tanah');
            $table->bigInteger('id_alamat_tanah');

            $table->string('fasilitas_tanah');
            $table->string('harga_tanah')->nullable();
            $table->string('status')->nullable();
            $table->string('deskripsi_tanah')->nullable();
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
        Schema::dropIfExists('data_tanah');
    }
}