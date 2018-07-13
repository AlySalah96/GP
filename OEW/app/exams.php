<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exams extends Model
{
    //
    protected $fillable=['name','startDate','startTime'  ,'endDate','endtime','period','exam_grade','num_of_questions','id_examiner','id_course'  ];
    
}
