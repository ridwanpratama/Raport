<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mapel', function (Blueprint $table) {
            $table->string('jenis_mapel');
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('rombel_id');
            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade');
            $table->foreign('rombel_id')->references('id')->on('rombel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mapel', function (Blueprint $table) {
            $table->dropColumn('jenis_mapel');
            $table->dropColumn('kelas');
            $table->dropColumn('jurusan_id');
            $table->dropForeign('jurusan_id');
        });
    }
}
