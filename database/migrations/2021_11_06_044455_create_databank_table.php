<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databank', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('nama_bank');
            $table->string('alamat_bank');
            $table->string('contact_bank');
            $table->text('link_maps_bank');
            $table->string('logo_bank');
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
        Schema::dropIfExists('databank');
    }
}
