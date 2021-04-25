<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upd extends Model
{
    protected $table = "upd";
    protected $fillable = ['siswa_id','detail_upd_id','nilai_upd', 'semester'];

    public function siswa()
    {
	    return $this->belongsTo('App\Siswa');
    }

    public function detail()
    {
    	return $this->belongsTo('App\Detail','detail_upd_id');
    }
}
