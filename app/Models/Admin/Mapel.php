<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
  protected $table = "mapel";

  protected $fillable = ['nama_mapel','guru_id'];

  public function guru()
  {
    return $this->belongsTo('App\Models\Admin\Guru');
  }

  public function nilai(){
    return $this->hasMany('App\Models\Nilai');
  }
}
