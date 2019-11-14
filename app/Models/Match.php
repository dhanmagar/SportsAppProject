<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    
    protected $fillable = [
        'start_time', 'team1_id', 'team2_id','status'
    ];

    public function team1()
    {
        return $this->belongsTo('\App\Models\Team', 'team1_id');
    }
    
    public function team2()
    {
        return $this->belongsTo('App\Models\Team', 'team2_id');
    }
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
}
