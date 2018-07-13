<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    //
    protected $fillable=['content','type','degree','id_exam','choose1','choose2','choose3','choose4','choosen_answer'];
   
}
