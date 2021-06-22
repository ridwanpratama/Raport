<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropKompetensiFromKikd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kikd', function (Blueprint $table) {
            $table->dropColumn('ki');
            $table->dropColumn('kd');
            $table->string('jenis_kikd');
            $table->string('kompetensi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kikd', function (Blueprint $table) {
            //
        });
    }
}
