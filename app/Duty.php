<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    protected $table = 'duties';
    protected $fillable = ['duty','position_id'];

    public $timestamps = false;

    public function position(){
    	$this->belongsTo('App\Position');
    }
}
