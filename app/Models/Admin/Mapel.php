<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapel extends Model
{
  use SoftDeletes;

  protected $table = "mapel";

  protected $fillable = ['nama_mapel','guru_id'];

  protected $dates = ['deleted_at'];

  public function guru()
  {
    return $this->belongsTo('App\Models\Admin\Guru');
  }

  public function nilai(){
    return $this->hasMany('App\Models\Nilai');
  }
}
