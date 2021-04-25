<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
  use SoftDeletes;

  protected $table = "detail_upd";
  protected $fillable = ['nama_upd','guru_id'];
  protected $dates = ['deleted_at'];

  public function guru()
  {
    return $this->belongsTo('App\Models\Admin\Guru');
  }

  public function upd(){
    return $this->hasMany('App\Models\Guru\Upd');
  }
}
