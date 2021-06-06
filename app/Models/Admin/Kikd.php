<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Kikd extends Model
{
    protected $table = 'kikd';
    protected $guarded = [];

    public function mapel()
    {
        return $this->hasMany('App\Models\Admin\Mapel');
    }
}
