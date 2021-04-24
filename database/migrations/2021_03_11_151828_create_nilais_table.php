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
          $table->integer('uh1')->nullable();
          $table->integer('uh2')->nullable();
          $table->integer('pts_ganjil')->nullable();
          $table->integer('rata_rata1')->nullable();
          $table->string('predikat1')->nullable();
          $table->string('ket1')->nullable();

          $table->integer('uh3')->nullable();
          $table->integer('uh4')->nullable();
          $table->integer('pas_ganjil')->nullable();
          $table->integer('rata_rata2')->nullable();
          $table->string('predikat2')->nullable();
          $table->string('ket2')->nullable();

          $table->integer('uh5')->nullable();
          $table->integer('uh6')->nullable();
          $table->integer('pts_genap')->nullable();
          $table->integer('uh7')->nullable();
          $table->integer('uh8')->nullable();
          $table->integer('pat')->nullable();
          $table->integer('rata_rata3')->nullable();
          $table->string('predikat3')->nullable();
          $table->string('ket3')->nullable();

          $table->integer('uh1k')->nullable();
          $table->integer('uh2k')->nullable();
          $table->integer('pts_ganjilk')->nullable();
          $table->integer('uh3k')->nullable();
          $table->integer('uh4k')->nullable();
          $table->integer('pas_ganjilk')->nullable();
          $table->integer('uh5k')->nullable();
          $table->integer('uh6k')->nullable();
          $table->integer('pts_genapk')->nullable();
          $table->integer('uh7k')->nullable();
          $table->integer('uh8k')->nullable();
          $table->integer('patk')->nullable();
          $table->integer('rata_rata4')->nullable();
          $table->string('predikat4')->nullable();
          $table->string('ket4')->nullable();

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
