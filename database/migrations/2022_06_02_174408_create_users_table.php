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
            $table->string('nama');
            $table->string('username');
            $table->string('email');
            $table->string('telepon');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->string('password');
            $table->string('foto')->nullable();
            $table->string('media_digital')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('url_mitra')->nullable();
            $table->string('nib')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->softDeletes();
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
