<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisNilaiToNilaiMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nilai_mapel', function (Blueprint $table) {
          $table->unsignedBigInteger('jenis_nilai_id');
          $table->foreign('jenis_nilai_id')->references('id')->on('jenis_nilai')->onDelete('cascade');
          $table->integer('nilai_pengetahuan');
          $table->integer('nilai_keterampilan');
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
          $table->dropColumn('jenis_nilai_id');
        });
    }
}
