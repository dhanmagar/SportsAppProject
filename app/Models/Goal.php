<?php

namespace App\Models;

use App\Models\Match;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable =[
        'match_id','player_id','time'
    ];
    public function match(){
        return $this->belongsTo('App\Models\Match', 'match_id');
    }
    public $timestamps = false;
    
    public function player(){
        return $this->belongsTo('App\Models\Player', 'player_id');
    }
    
}
