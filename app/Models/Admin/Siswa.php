<?php

namespace App\Models\Admin;

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
    return $this->belongsTo('App\Models\Admin\Jurusan');
  }

  public function rayon()
  {
    return $this->belongsTo('App\Models\Admin\Rayon');
  }

  public function absen(){
    return $this->hasMany('App\Models\Guru\Absen');
  }

  public function nilai(){
    return $this->hasMany('App\Models\Guru\Nilai');
  }

  public function rombel(){
    return $this->belongsTo('App\Models\Admin\Rombel');
  }

  public function kikd()
  {
    return $this->belongsTo('App\Models\Admin\Kikd');
  }
}
