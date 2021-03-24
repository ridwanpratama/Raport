<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;

    protected $table = "siswa";
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function jurusan()
    {
	    return $this->belongsTo('App\Jurusan');
    }

    public function rayon()
    {
	    return $this->belongsTo('App\Rayon');
    }

    public function absen(){
    	return $this->hasMany('App\Absen');
    }

    public function nilai(){
    	return $this->hasMany('App\Nilai');
    }

    public function rombel(){
    	return $this->belongsTo('App\Rombel');
    }

}