<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $fillable = ['name','project_id'];
    public $timestamps = false;

    public function project(){
    	return $this->belongsTo('App\Project');
    }
}
