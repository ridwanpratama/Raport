<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class JenisNilai extends Model
{
  protected $table = "jenis_nilai";

  public function upd(){
    return $this->hasMany('App\Models\Guru\Upd');
  }

  public function absen(){
    return $this->hasMany('App\Models\Guru\Absen');
  }
}
