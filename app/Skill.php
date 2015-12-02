<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = ['skill','position_id'];

    public $timestamps = false;

    public function position(){
    	$this->belongsTo('App\Position');
    }
}
