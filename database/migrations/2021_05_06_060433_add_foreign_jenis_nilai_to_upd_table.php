<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignJenisNilaiToUpdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('upd', function (Blueprint $table) {
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
        Schema::table('upd', function (Blueprint $table) {
          $table->dropForeign(['jenis_nilai_id']);
        });
    }
}
