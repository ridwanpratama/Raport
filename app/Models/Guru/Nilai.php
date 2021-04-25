<?php

namespace App\Models\Guru;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
  protected $table = "nilai_mapel";
  protected $guarded = [];

  public function siswa()
  {
    return $this->belongsTo('App\Models\Admin\Siswa');
  }

  public function rayon()
  {
    return $this->belongsTo('App\Models\Admin\Rayon');
  }

  public function mapel()
  {
    return $this->belongsTo('App\Models\Admin\Mapel');
  }

  public function jurusan()
  {
    return $this->belongsTo('App\Models\Admin\Jurusan');
  }

  public function jenis_nilai()
  {
    return $this->belongsTo('App\Models\Admin\Jenisnilai');
  }
}
