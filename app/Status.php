<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = 'status';

    protected $fillable = [
        'status_name',
    ];
    public function status() {
        return $this->hasMany('App\Project', 'status_id');
    }
}
