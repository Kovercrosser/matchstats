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

    public function turnamentType($type)
    {
        switch ($type)
        {
            case 'liga':
                return 'Liga (jeder gegen jeden)';
            case 'tournament':
                return 'Tunier (Gruppenphase)';
            case 'ko-tournament':
                return 'KO-Tournament';
            case 'team-vs-team':
                return 'Team vs. Team';
            case 'free':
                return 'Free';
        }
    }
}
