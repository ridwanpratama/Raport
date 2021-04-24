<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = "nilai_mapel";
    protected $guarded = [];
    
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
