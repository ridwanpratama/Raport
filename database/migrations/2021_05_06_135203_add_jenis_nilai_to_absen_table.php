<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisNilaiToAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absen', function (Blueprint $table) {
            $table->unsignedBigInteger('jenis_nilai_id');
            $table->foreign('jenis_nilai_id')->references('id')->on('jenis_nilai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absen', function (Blueprint $table) {
            //
        });
    }
}
