<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_mapel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id')->nullable();
            $table->unsignedBigInteger('mapel_id');
            $table->integer('uh1');
            $table->integer('uh2');
            $table->integer('pts_ganjil');
            $table->integer('uh3');
            $table->integer('uh4');
            $table->integer('pas_ganjil');
            $table->integer('uh5');
            $table->integer('uh6');
            $table->integer('pts_genap');
            $table->integer('uh7');
            $table->integer('uh8');
            $table->integer('pat');
            $table->integer('rata_rata');
            $table->string('predikat');
            $table->string('rayon_id');
            $table->string('jurusan_id');
            $table->string('rombel');
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_mapel');
    }
}
