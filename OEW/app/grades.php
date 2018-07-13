<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grades extends Model
{
    //
    protected $fillable=['studentGrade','student_id','exam_id','exam_name'];
}
