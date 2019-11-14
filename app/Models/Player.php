<?php

namespace App\Models;

use App\Models\Goal;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'first_name','last_name','team_id'
    ];

    public function team(){
        return $this->belongsTo('\App\Models\Team','team_id');
    }
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
}
