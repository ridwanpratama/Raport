<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
  protected $table = "rombel";
  protected $guarded = [];

  public function siswa()
  {
    return $this->hasMany('App\Models\Admin\Siswa');
  }

  public function jurusan()
  {
    return $this->belongsTo('App\Models\Admin\Jurusan');
  }
}
