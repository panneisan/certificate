<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
//    protected $dates = ['start_time', 'end_time'];
    public function getCourse()
    {
        return $this->belongsTo('App\Course',"course_id");
    }
}
