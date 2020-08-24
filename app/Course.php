<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title','outline','photo'
    ];
    public function getBatch()
    {
        return $this->hasOne('App\User',"course_id");
    }

}
