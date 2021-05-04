<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{
  use SoftDeletes;

  protected $table = "jurusan";
  protected $fillable = ['id','nama_jurusan'];

  public function siswa(){
    return $this->hasMany('App\Models\Admin\Siswa');
  }

  public function nilai(){
    return $this->hasMany('App\Models\Guru\Nilai');
  }

  public function rombel(){
    return $this->hasMany('App\Models\Admin\Rombel');
  }

  public function mapel(){
    return $this->hasMany('App\Models\Admin\Mapel');
  }
}
