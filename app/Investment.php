<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    //
    protected $table = 'investment';

    protected $fillable = [
        'project_name',
        'project_desc',
        'project_looking',
        'project_month',
        'user_id',
        'location_id',
        'sector_id',
        'invest_id',
        'capital_id',
        'file'

    ];
    public function location() {
        return $this->belongsTo('App\Location');
    }
    public function capital() {
        return $this->belongsTo('App\Capital');
    }
    public function sector() {
        return $this->belongsTo('App\Sector');
    }
    public function invest() {
        return $this->belongsTo('App\Invest');
    }

}
