<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    public $timestamps = false;
    protected $table = 'doctor';

    public function visitLogs(){
    	return $this->hasMany('VisitLog');
    }
}
