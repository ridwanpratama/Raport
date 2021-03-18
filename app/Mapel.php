<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = "mapel";

    protected $fillable = ['nama_mapel','guru_id'];

    public function guru()
    {
	    return $this->belongsTo('App\Guru');
    }

    public function nilai(){
    	return $this->hasMany('App\Nilai');
    }
}

