<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    protected $fillable = ['position','description'];

    public $timestamps = false;

    public function duty(){
    	return $this->hasMany('App\Duty','position_id');
    }

    public function skill(){
    	return $this->hasMany('App\Skill','position_id');
    }

    public function requirement(){
    	return $this->hasMany('App\Requirement','position_id');
    }

    public function setPositionAttribute($position){
        $this->attributes['position'] = str_replace(['/','-'],'–',strtolower($position));
    }

    public function getPositionAttribute($position){
        return ucwords($position);
    }

    public function getPositionLinkAttribute(){
        return str_replace(' ','-',strtolower($this->position));
    }
}
