<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = ['description','name','client','consultant','start_date','completion_date','status'];

    public $timestamps = false;

    public function photo(){
    	return $this->hasMany('App\Photo','project_id');
    }

    public function location(){
    	return $this->hasOne('App\Location','project_id');
    }


    protected $dates = ['start_date','completion_date'];

    public function setStartDateAttribute($date){
    	$this->attributes['start_date'] = Carbon::parse($date);
    }

    public function setCompletionDateAttribute($date){
    	$this->attributes['completion_date'] = Carbon::parse($date);
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = str_replace('-','–',strtolower($name));
    }

    public function getNameLinkAttribute(){
        $link = strtolower(str_replace(' ', '-', $this->name));
        return $link;
    }

    public function getNameAttribute($name){
        return ucwords(strtolower($name));
    }
}
