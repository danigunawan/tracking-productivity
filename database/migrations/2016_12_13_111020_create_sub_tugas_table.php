<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tugas', function (Blueprint $table) {
            $table->increments('id_subtugas');
             $table->integer('id_tugas');
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
                $table->foreign('id_tugas')->references('id_tugas')->on('tugas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_tugas');
    }
}
