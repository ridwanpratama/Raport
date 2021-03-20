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

            $table->integer('uh1k');
            $table->integer('uh2k');
            $table->integer('pts_ganjilk');
            $table->integer('uh3k');
            $table->integer('uh4k');
            $table->integer('pas_ganjilk');
            $table->integer('uh5k');
            $table->integer('uh6k');
            $table->integer('pts_genapk');
            $table->integer('uh7k');
            $table->integer('uh8k');
            $table->integer('patk');
            $table->integer('rata_ratak');
            $table->string('predikatk');

            $table->string('ket');
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
