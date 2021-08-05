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
            $table->string('nomor_surat')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('panjang_tanah');
            $table->string('lebar_tanah');
            $table->string('fasilitas_tanah');
            $table->string('harga_tanah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('deskripsi_tanah')->nullable();
            $table->string('gambar_surat')->nullable();
            $table->string('gambar_bidang_tanah')->nullable();
            $table->string('status')->nullable();
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
