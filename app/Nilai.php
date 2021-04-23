<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = "nilai_mapel";
    protected $fillable = ['siswa_id', 'mapel_id', 'uh1', 'uh2', 'pts_ganjil', 'uh3', 'uh4', 'pas_ganjil', 'uh5', 'uh6', 'pts_genap', 'uh7', 'uh8', 'pat', 'rata_rata', 'uh1k', 'uh2k', 'pts_ganjilk', 'uh3k', 'uh4k', 'pas_ganjilk', 'uh5k', 'uh6k', 'pts_genapk', 'uh7k', 'uh8k', 'patk', 'rata_ratak', 'predikat', 'predikatk', 'ket'];

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

    public function jurusan()
    {
	    return $this->belongsTo('App\Jurusan');
    }

    public function jenis_nilai()
    {
	    return $this->belongsTo('App\Jenisnilai');
    }
}
