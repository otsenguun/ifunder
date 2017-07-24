<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'location';

    protected $fillable = [
        'location_name',
    ];
    public function location() {
        return $this->hasMany('App\Project', 'location_id');
    }
    public function location1() {
        return $this->hasMany('App\Investment', 'location_id');
    }
}
