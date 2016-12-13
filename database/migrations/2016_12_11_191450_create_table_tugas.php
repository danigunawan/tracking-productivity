<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('id_tugas');
            $table->string('nama_tugas');
             $table->string('deskripsi_tugas');
            $table->date('deadline');
             $table->date('tanggal_selesai')->nullable();
              $table->date('tanggal_konfirmasi')->nullable();
            $table->string('prioritas');
            $table->integer('id_kategori_tugas');
             $table->integer('status_selesai')->default(0);
             $table->integer('status_konfirmasi')->default(0);
            $table->integer('id_user_bertugas');
              $table->integer('id_user_memberitugas')->nullable();
              $table->integer('id_user_konfirmasi')->nullable();
            $table->timestamps();
            
            $table->foreign('id_user_bertugas')->references('id')->on('users');
            $table->foreign('id_user_memberitugas')->references('id')->on('users');
            $table->foreign('id_kategori_tugas')->references('id')->on('kategori_tugas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
}
