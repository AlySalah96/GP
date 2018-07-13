<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courses;
use App\exams;
use App\grades;
use DB ;

use App\User;

class controllerStatistics extends Controller
{
   
    public function view_stat()
    {
       
       $presented_data=DB::table('grades')->select(DB::raw('AVG(studentGrade)as avgerageGrades')  ,'exam_name')->groupBy('exam_name')->get();
       
       
       $result[] = ['exam_name','avgerageGrades'];
       foreach ($presented_data as $key => $value) {
           $result[++$key] = [$value->exam_name,(int)$value->avgerageGrades];
       } 
       return view('statistics',[
           'chart_data'=>json_encode($result)
       ]); 



    }
		
    
		
    

}
