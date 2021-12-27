<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('id_pembeli');
            $table->smallInteger('id_penjual');
            $table->smallInteger('id_tanah');
            $table->string('bukti_transfer')->nullable();
            $table->string('status_transaksi')->nullable();
            $table->string('gambar_resi')->nullable();
            $table->smallInteger('status_penerimaan_barang')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}