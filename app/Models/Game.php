<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function statistics_player_a()
    {
      return $this->hasOne('App\Models\Statistic');
    }

    public function statistics_player_b()
    {
      return $this->hasOne('App\Models\Statistic');
    }

    public function tournament()
    {
      return $this->belongsTo('App\Models\Tournament');
    }
}
