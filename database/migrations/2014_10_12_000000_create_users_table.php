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
            $table->string('tempat_tanggal_lahir');
            $table->integer('agama');
            $table->string('jenis_kelamin');
            $table->string('no_ktp');
            $table->string('pekerjaan');
            $table->string('alamat_kerja');
            $table->string('nama_ibu');
            $table->string('alamat')->nullable();
            $table->string('email')->unique();
            $table->string('no_hp')->nullable();
            $table->string('password');
            $table->string('role');
            $table->string('status')->nullable();
            $table->string('avatar')->nullable();
            $table->string('foto_ktp');
            $table->string('bio')->nullable();
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
