<?php

namespace App;
use App\codeQuestions ;
use Illuminate\Database\Eloquent\Model;

class codeQuestions extends Model
{
    //
    protected $fillable=['content','student_answer','degree','language','type','id_exam'];
}
