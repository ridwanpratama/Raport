<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{
    use SoftDeletes;

    protected $table = "jurusan";
    protected $fillable = ['id','nama_jurusan'];

    public function siswa(){
    	return $this->hasMany('App\Siswa');
    }

    public function nilai(){
    	return $this->hasMany('App\Nilai');
    }

    public function rombel(){
    	return $this->hasMany('App\Rombel');
    }
}
