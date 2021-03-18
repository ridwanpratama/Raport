<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raport', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('nilai_id');
            $table->unsignedBigInteger('absen_id');
            $table->unsignedBigInteger('upd_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('rayon_id');
            $table->integer('rata_rata');
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('nilai_id')->references('id')->on('nilai')->onDelete('cascade');
            $table->foreign('absen_id')->references('id')->on('absen')->onDelete('cascade');
            $table->foreign('upd_id')->references('id')->on('upd')->onDelete('cascade');
            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade');
            $table->foreign('rayon_id')->references('id')->on('rayon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raport');
    }
}
