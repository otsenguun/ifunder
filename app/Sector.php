<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    //
    protected $table = 'sector';

    protected $fillable = [
        'sector_name',
    ];
    public function sector() {
        return $this->hasMany('App\Project', 'sector_id');
    }
    public function sector1() {
        return $this->hasMany('App\Investment', 'sector_id');
    }
}
