<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = "jurusan";

    protected $fillable = ['id','nama_jurusan'];

    public function siswa(){
    	return $this->hasMany('App\Siswa');
    }
}
