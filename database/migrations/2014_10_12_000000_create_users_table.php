<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('id_ktp_user');
            $table->bigInteger('id_alamat_user')->nullable();
            $table->bigInteger('id_pekerjaan_user')->nullable();
            $table->bigInteger('id_rekening')->nullable();
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->bigInteger('role')->nullable();
            $table->string('status')->nullable();
            $table->string('avatar');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}