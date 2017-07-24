<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    //
    protected $table = 'capital';

    protected $fillable = [
        'capital_name',
    ];
    public function capital() {
        return $this->hasMany('App\Project', 'capital_id');
    }
    public function capital1() {
        return $this->hasMany('App\Investment', 'capital_id');
    }
}
