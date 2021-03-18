<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = "detail_upd";
    protected $fillable = ['nama_upd','guru_id'];

    public function guru()
    {
	    return $this->belongsTo('App\Guru');
    }
}
