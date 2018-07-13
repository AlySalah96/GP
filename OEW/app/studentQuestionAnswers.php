<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentQuestionAnswers extends Model
{
    //
    protected $fillable=['answer','question_type','id_question','student_id','exam_id'];
    
}
