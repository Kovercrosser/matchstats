<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }
}
