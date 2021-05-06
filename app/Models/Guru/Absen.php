<?php

namespace App\Models\Guru;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
  protected $table = 'absen';
  protected $fillable = ['siswa_id', 'sakit', 'alpha', 'izin', 'semester'];

  public function siswa()
  {
    return $this->belongsTo('App\Models\Admin\Siswa');
  }

  public function jenis_nilai()
  {
    return $this->belongsTo('App\Models\Admin\JenisNilai','jenis_nilai_id');
  }
}
