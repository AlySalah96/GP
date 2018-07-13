<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentCodeAnswer extends Model
{
    //
    protected $fillable=['answer','question_id','student_id'];
}
