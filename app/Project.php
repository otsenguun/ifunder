<?php

namespace App;
use App\Capital;
use App\Location;
use App\Sector;
use App\Status;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'projects';

    protected $fillable = [
        'project_name',
        'project_desc',
        'project_generation',
        'project_cost',
        'project_own',
        'project_looking',
        'user_id',
        'location_id',
        'sector_id',
        'status_id',
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
    public function status() {
        return $this->belongsTo('App\Status');
    }
}
