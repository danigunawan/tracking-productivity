<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_tugas', function (Blueprint $table) {
            $table->increments('id_komentar_tugas');
            $table->string('isi_komentar');
            $table->integer('id_user');
            $table->integer('id_tugas');
            $table->timestamps();

               $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('komentar_tugas');
    }
}
