<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';
    protected $fillable = ['name','position', 'photo', 'description', 'description2', 'description3'];

    public $timestamps = false;

    public function getNameAttribute($name){
    	return ucwords($name);
    }

    public function getPositionAttribute($position){
    	return ucwords($position);
    }

    public function getFirstNameAttribute(){
    	$name = explode(' ',$this->name);

    	return strtolower($name[0]);
    }
}
