<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rayon extends Model
{
    use SoftDeletes;

    protected $table = "rayon";
    protected $fillable = ['nama_rayon','guru_id'];
    protected $dates = ['deleted_at'];

    public function siswa(){
    	return $this->hasMany('App\Siswa');
    }

    public function guru(){
        return $this->belongsTo(Guru::class);
    }

    public function nilai(){
    	return $this->hasMany('App\Nilai');
    }
}
