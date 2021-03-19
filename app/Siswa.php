<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
    protected $fillable = ['nis', 'nama_siswa', 'tingkat', 'rombel', 'rayon_id', 'jurusan_id'];

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

}