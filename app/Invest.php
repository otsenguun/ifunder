<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    //
    protected $table = 'invest';

    protected $fillable = [
        'invest_name',
    ];
    public function invest() {
        return $this->hasMany('App\Investment', 'invest_id');
    }
}
