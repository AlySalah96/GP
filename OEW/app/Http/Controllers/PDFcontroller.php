<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF ;
//use Vsmoraes\Pdf\Pdf;
use App\User;
use App\grades;
use App\exams;
use DB;


//use PDF ;
class PDFcontroller extends Controller
{
    //
 
     public function getPDF($id)
    {
        $all_users=User::all();
       // $all_grades=grades::all();
     
        $exam_name=DB::table('exams')->select('name')->where('id','=', $id)->get();
       

        $students_names=array();
        $students_grades=DB::table('grades')->select('student_id','studentGrade')->where('exam_id','=', $id)->get();
        foreach ($students_grades as $i) {
           $name= DB::table('users')
           ->select('name')
           ->where('id','=',$i->student_id)->get();
           array_push($students_names,$name);
        } 

        
        
         $pdf=PDF::loadView('reports',['exam_name'=>$exam_name ,'students_names'=>$students_names,'students_grades'=> $students_grades]);
         
         return $pdf->stream('reports.pdf');//->download('reports.pdf');
    }

}
