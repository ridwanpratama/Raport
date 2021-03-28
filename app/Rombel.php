<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = "rombel";
    protected $guarded = [];

    public function siswa()
    {
	    return $this->hasMany('App\Siswa');
    }

    public function jurusan()
    {
	    return $this->belongsTo('App\Jurusan');
    }
}
