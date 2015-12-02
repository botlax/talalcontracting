<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = 'requirements';
    protected $fillable = ['requirement','position_id'];

    public $timestamps = false;

    public function position(){
    	$this->belongsTo('App\Position');
    }
}
