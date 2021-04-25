<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';
    protected $fillable = ['siswa_id', 'sakit', 'alpha', 'izin', 'semester'];

    public function siswa()
    {
	    return $this->belongsTo('App\Siswa');
    }
}
