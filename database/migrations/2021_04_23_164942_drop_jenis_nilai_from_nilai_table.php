<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropJenisNilaiFromNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nilai_mapel', function (Blueprint $table) {
          $table->dropColumn('uh1');
          $table->dropColumn('uh1k');
          $table->dropColumn('uh2');
          $table->dropColumn('uh2k');
          $table->dropColumn('pts_ganjil');
          $table->dropColumn('pts_ganjilk');
          $table->dropColumn('rata_rata1');
          $table->dropColumn('predikat1');
          $table->dropColumn('ket1');
          $table->dropColumn('uh3');
          $table->dropColumn('uh3k');
          $table->dropColumn('uh4');
          $table->dropColumn('uh4k');
          $table->dropColumn('pas_ganjil');
          $table->dropColumn('pas_ganjilk');
          $table->dropColumn('rata_rata2');
          $table->dropColumn('predikat2');
          $table->dropColumn('ket2');
          $table->dropColumn('uh5');
          $table->dropColumn('uh5k');
          $table->dropColumn('uh6');
          $table->dropColumn('uh6k');
          $table->dropColumn('pts_genap');
          $table->dropColumn('pts_genapk');
          $table->dropColumn('uh7');
          $table->dropColumn('uh7k');
          $table->dropColumn('uh8');
          $table->dropColumn('uh8k');
          $table->dropColumn('pat');
          $table->dropColumn('patk');
          $table->dropColumn('rata_rata3');
          $table->dropColumn('predikat3');
          $table->dropColumn('ket3');
          $table->dropColumn('rata_rata4');
          $table->dropColumn('predikat4');
          $table->dropColumn('ket4');
          $table->dropColumn('created_at');
          $table->dropColumn('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nilai_mapel', function (Blueprint $table) {
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
        });
    }
}
