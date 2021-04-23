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
            //
        });
    }
}
