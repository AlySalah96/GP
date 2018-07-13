<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentQuestionAnswers;
use DB ;
use File;
use App\studentCodeAnswer ;
use App\grades;

class AnswerExamController extends Controller
{


    public function answer(Request $request){
        /////////////////////
        $totalDegree=0;
        $studentDegree=0;
        $student_id=$request->student_id;
        $exam_id3=$request->exam_id3;
        
       // dd( $student_id);
////////////storing true/false answers in studentQuestionAnswers table///////////////
        $questions=$request->question;
       if($questions !=null)
       {
    	foreach ($questions as $key => $question) {
                $qiestion_id=$question;
    			$s="answer_".$question;
                $answer=$request->$s;
                
                $exam_id=$request->exam_id;
                $question_type=$request->question_type;
               
        studentQuestionAnswers::create([
            'answer'=>   $answer,
            'id_question'=>$qiestion_id,
            'exam_id'=>$exam_id,
            'question_type'=>$question_type,
            'student_id'=> $student_id
        ]);

//////////'degree' && 'choosen_answer' for true false question/////////////
                $selection=DB::table('questions')
                ->select('degree', 'choosen_answer')
                ->where('id','=',$qiestion_id)
                ->get();
                 $totalDegree = $totalDegree + $selection[0]->degree;
                 if ($selection[0]->choosen_answer == $answer) 
                 {
                    $studentDegree = $studentDegree + $selection[0]->degree;
                    
                 }
  
        }
    }   

///////////////////////////////////////////////////////////////////////////
         $questions2=$request->question2 ;
         if($request->question2 !=null)
         {
        foreach($questions2 as $key => $question2 )
        {
            $qiestion_id2=$question2;
            
            
            $s2="answer_".$question2;
            $answer2=$request->$s2;
            
            $exam_id2=$request->exam_id2;
            $question_type2=$request->question2_type;
           
        
        studentQuestionAnswers::create([
            'answer'=>   $answer2,
            'id_question'=>$qiestion_id2,
            'exam_id'=>$exam_id2,
            'question_type'=>$question_type2,
            'student_id'=> $student_id
        ]);
               
        //////////'degree' && 'choosen_answer' for true false question/////////////
                $selection=DB::table('questions')
                ->select('degree', 'choosen_answer')
                ->where('id','=',$qiestion_id2)
                ->get();
                $totalDegree = $totalDegree + $selection[0]->degree;
                 if ($selection[0]->choosen_answer == $answer2) 
                 {
                    $studentDegree = $studentDegree + $selection[0]->degree;
                    
                 }
    

        }
    }
        ////////////////////////////////correct code ////////////////////////////////////////////////////

      
        
        $codequestionID=$request->codequestionID ;
        $language=$request->language ;
       
     
       if($language !=null)
       {
        foreach($codequestionID as  $key => $codequestion )
        {
           
            $s="student_answer".$codequestion ;
            $stdent_answer=$request->$s;
            // store answer in code_qustions_answer//////////
            studentCodeAnswer::create([
                'answer'=>$stdent_answer,
                 'question_id'=> $codequestion,
                 'student_id'=>$student_id
            ]);
               
            ////////////////////////////    
         
         $code_info=DB::table('code_questions')->where('id',$codequestion)->get();
       
        $Codo_degree=$code_info[0]->degree;
        $totalDegree = $totalDegree +$Codo_degree ;
         $code_body=$stdent_answer;
         $errorFlag=false;
         $errorDetail = array();
         //getError();

         $array_output =array();
         $real_out=array();
         
         $all_true=true;
         
         if( $language=="java")
         {
         file_put_contents('source.java',  $stdent_answer);
         exec('javac source.java',$errorDetail,$errorFlag);
         
         
         if(!$errorFlag)
          {
                   exec("java source",$array_output);
             
             
                    $contents  = File::get("outputFile.txt");
            
                    $contents = trim(preg_replace('/\s\s+/', ' ', $contents));
                     $real_out=explode(" ",$contents);
               
                     if($real_out==$array_output)
                     $studentDegree=$studentDegree+ $Codo_degree;
                       
                   
                     //cleanUp();
                 }
         else 
             {
                   // $r = addslashes(getError());
             }
         
          
         
          }
        else if($language=="c++")
          { 
            $real_out="";
            $r="";
            $source= "
             #include <string>
             int stoi(string s)
                {
                  int i, n=0;
                   for(i=0; s[i]>='0' && s[i]<='9'; i++)
                          n = 10*n + (s[i] - '0');
                    return n;
                } 
                ".$code_body ;
            file_put_contents('source.cpp',$source);
            exec('g++ source.cpp -o source.exe  2>&1',$errorDetail,$errorFlag);
            
            
            if(!$errorFlag)
            {
                exec("source.exe",$array_output);
                
                  foreach($array_output as $key => $value){ 
                        $r.= $value;
                    }
                
                  $contents  = File::get("outputFile.txt");
                  $contents = trim(preg_replace('/\s\s+/',' ',  $contents));
                  $contents = str_replace(' ', '', $contents);
                   $real_out .= $contents;
               
                
                
                    if($real_out==$r)
                       $studentDegree=$studentDegree+ $Codo_degree;
                           
                      
                
            }
            else 
            {
                //$r = addslashes(getError());
            }
 
          }




        }//foreach

    }//if lan
     /////////////////insert grade in grade table//////////////
     $exam_info=DB::table('exams')->where('id','=', $exam_id3)->get();
    
     $exam_name=$exam_info[0]->name;
    
     grades::create([
        'studentGrade'=>$studentDegree,
        'student_id'=>$student_id,
        'exam_id'=> $exam_id3,
        'exam_name'=>$exam_name
   ]);
       /////////////////////////////get grades/////////////////////////////////////////////////
        return view('good_luck',[
                    'studentDegree'=>$studentDegree,
                    'totalDegree'=>$totalDegree
                ]); 
                dd($studentDegree);
           

                


            }

           
    
    


    public function getError(){
		global $errorDetail ;
		$data = '';
		foreach($errorDetail as $key=>$value){
			$data .= $value.'</br>';
		}
		return $data;
    }
    public function cleanUp(){
		if(is_file('source.java'))	
			unlink('source.java');
		if(is_file('source.class'))
			unlink('source.class');
    }  

    public function cleanUpCPP(){
		if(is_file('source.cpp'))	
			unlink('source.cpp');
		if(is_file('source.exe'))
			unlink('source.exe');
		
    }  
}
