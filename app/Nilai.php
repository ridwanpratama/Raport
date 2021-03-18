<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = "nilai_mapel";
    protected $fillable = ['siswa_id', 'mapel_id', 'uh1', 'uh2', 'pts_ganjil', 'uh3', 'uh4', 'pas_ganjil', 'uh5', 'uh6', 'pts_genap', 'uh7', 'uh8', 'pat', 'rata_rata', 'rombel', 'rayon_id', 'jurusan_id', 'predikat'];

    public function siswa()
    {
	    return $this->belongsTo('App\Siswa');
    }

    public function rayon()
    {
	    return $this->belongsTo('App\Rayon');
    }

    public function mapel()
    {
	    return $this->belongsTo('App\Mapel');
    }
}
