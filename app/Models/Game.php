<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    public function statistics_player_a()
    {
        return $this->hasMany('App\Models\Statistic', 'id', 'player_a_id');
    }

    public function statistics_player_b()
    {
        return $this->hasMany('App\Models\Statistic', 'id', 'player_b_id');
    }

    public function tournament()
    {
        return $this->belongsTo('App\Models\Tournament');
    }
}
