<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';
    protected $guarded = [];

    public function nilai()
    {
        return $this->hasMany('App\Models\Guru\Nilai');
    }
}
