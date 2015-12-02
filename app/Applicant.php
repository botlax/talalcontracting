<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicants';
    protected $fillable = ['resume','firstname','lastname','country','email','mobile','coverletter','position_id'];

    public $timestamps = false;

}
