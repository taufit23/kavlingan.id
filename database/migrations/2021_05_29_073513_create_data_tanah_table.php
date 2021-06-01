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
            $table->integer('id_user');
            $table->integer('id_jenis_surat');
            $table->string('nama_pemilik');
            $table->string('nomor_surat');
            $table->string('alamat_tanah');
            $table->string('luas_tanah');
            $table->string('fasilitas_tanah');
            $table->string('status_tanah');
            $table->string('harga_booking_tanah');
            $table->string('deskripsi_tanah');
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
