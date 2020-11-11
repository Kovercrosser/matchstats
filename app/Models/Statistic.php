<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $guarded = [];

    public function game()
    {
      return $this->belongsTo('App\Models\Game', 'user_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function gameend($game)
    {
        switch ($game)
        {
            case 'normal':
                return 'Normal (90min)';
            case 'overtime':
                return 'Overtime (120min)';
            case 'penalty':
                return 'Penalty Shootout';
            case 'goldengoal':
                return 'Goalden Goal';
        }
    }
}
