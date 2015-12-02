<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $fillable = ['name','project_id'];
    public $timestamps = false;

    public function project(){
    	return $this->belongsTo('App\Project');
    }
}