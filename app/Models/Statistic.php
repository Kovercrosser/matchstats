<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $guarded = [];

    public function game()
    {
      return $this->belongsTo('App\Models\Game');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
