<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use SoftDeletes;

    protected $table = "guru";
    protected $fillable = ['nama_guru', 'jk', 'no_telp'];
    protected $dates = ['deleted_at'];

    public function mapel(){
    	return $this->hasMany('App\Mapel');
    }
}
