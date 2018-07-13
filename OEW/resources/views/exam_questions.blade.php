@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="free-educational-responsive-web-template-webEdu">
    <meta name="author" content="webThemez.com">
    <title>Student Examiner page</title>
    <!--{!!Html::image('images/favicon.png')!!}-->
    {!!Html::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/bootstrap-theme.css')!!}
    {!!Html::style('css/style.css')!!}
    <link rel="stylesheet" href="{{asset('font/css/font-awesome.min.css')}}">

  



<!--////////////////////////////////////////////////////////////////-->
<style type="text/css">

.show {
 display:block;
}

.hide {
 display:none;
}
</style>
<!--///////////////////////////////////////////////////////////////////-->
</head>






<body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.png" alt="Techro HTML5 template"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right mainNav">
                @if(Auth::user()->role==1)
                <li><a href="{{url('examiner')}}">Home</a></li>
                @else
                <li><a href="{{url('showExams')}}">Home</a></li>
                @endif
                <li><a href="{{url('about')}}">About</a></li>
                <li><a href="{{url('statistics')}}">statistics</a></li>
                <li><a onclick="javascript:alert('free system ')">Price</a></li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('about')}}">About</a></li>
                            <li><a href="{{url('statistics')}}">statistics</a></li>
                            <li><a href="{{url('contact')}}">Contact</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->

  <header id="head" class="secondary">
            <div class="container">
                    <h1>exam_questions Page</h1>
                    <p>description:</p>
                </div>
    </header>


<div class="container" style="opacity:.9">
<div class="row">
<div class="panel panel-default">

<h2> creating new question :  {{$allExams->last()->name}} </h2>
<form  name="form1" display="in-line" action="" method="POST" enctype="mulipart/form-data">
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<h3>Questions type :</h3><select class="form-control" name ="Question_type"  onchange="addQuestion();" style="size:60">
<option value="doNothing"> choose A Question type from this list</option>
<option value="True/false"> True/false</option>
<option value="code_question"  > code question</option>
<option value="multiple choose" > multiple Choose</option>
</select>
</form>
</div>


</div>
    <div class="row">






    <!--////////////////////code_question/////////////////////-->
<div id="code_question">
<form action="storeQuestionInfo" method="POST" enctype="mulipart/form-data" id="codeForm">
<input type="hidden" name="_token" value="{{csrf_token()}}"/>


<div class="form-group">
    <label for="content"><h3>Write code question here</h3> </label>
    <textarea type="text" name="content"  class="form-control" id="content" rows="3"></textarea>
</div>

 
<!--
<label  for="test_case1"><h3>test case1  :</h3> </label>
<input type="text" name="test_case1" class="form-control" id="test_case1" >


<label  for="test_case1_result"><h3>test case1 result :</h3> </label>
<input type="text" name="test_case1_result" class="form-control" id="test_case1_result" >


<label  for="test_case2"><h3>test case2 :</h3> </label>
<input type="text" name="test_case2" class="form-control" id="test_case2" >



<label  for="test_case2_result"><h3>test case2 result :</h3> </label>
<input type="text" name="test_case2_result" class="form-control" id="test_case2_result" >

<label  for="test_case3"><h3>test case3 :</h3> </label>
<input type="text" name="test_case3" class="form-control" id="test_case3" >


<label  for="test_case3_result"><h3>test case3 result :</h3> </label>
<input type="text" name="test_case3_result" class="form-control" id="test_case3_result" >
-->



<label  for="degre"><h3>degree :</h3> </label>
<input type="text" name="degree" class="form-control" id="degre" ></br>

language :<select class="form-control" name ="language">
<option value=""> select a language</option>
<option value="java"> Java</option>
<option value="c++"  > C++</option>
</select>
<input hidden="hidden" type="text" name="type" value="code">

<input hidden="hidden" type="text" name="id_exam" value="{{$allExams->last()->id}}" >

<button class="btn btn-default" type="submit">create</button>



</form>
</div>
<!--////////////////////true/false Q/////////////////////-->
<div id="True_False_question">
<form action="multipleChooseQuestion" method="POST" enctype="mulipart/form-data"  id="TFform">
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<input hidden="hidden"  type="radio" name="type" value="true false" checked="checked">

<div class="form-group">
    <label for="exampleFormControlTextarea1"><h3>Write True/False question here</h3> </label>
    <textarea  type="text" name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>


 <h3>Which one is the correct answer:</h3>

<input  type="radio" id="True" name="choosen_answer" value="True">
<label  for="True"><h3>True</h3> </label><br>

<input type="radio"  id="False" name="choosen_answer" value="False">
<label  for="True"><h3>False</h3></label><br>


<div class="form-group">
    <label for="degree"><h3>Qustion degree :</h3></label>
    <input type="text" name="degree" class="form-control" id="degree" placeholder="Enter Qustion degree ">
  </div>

<input hidden="hidden" type="text" name="id_exam" value="{{$allExams->last()->id}}">
    <button class="btn btn-default" type="submit">create</button>


</form>



</div>









<!--/////////////////multiple_Choice_question////////////////////////-->
<div id="multiple_Choice_question">
<form action="multipleChooseQuestion" method="POST" enctype="mulipart/form-data"  id="MchoosForm">
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<input hidden="hidden" type="radio"  id="question_type" checked="checked" name="type" value="multiple choose">
 
<div class="form-group">
    <label for="question_content"><h3>Write  multiple choice question here:</h3> </label>
    <textarea  type="text" name="content" class="form-control" id="question_content" rows="3"></textarea>
</div>



<label  for="choose1"><h3>choose1 : </h3></label>
<input class="form-control" type="text" name="choose1" id="choose1" >

<label  for="choose2"><h3>choose2 : </h3></label>
<input class="form-control" type="text" name="choose2"  id="choose2" >


<label  for="choose3"><h3>choose3 : </h3></label>
<input class="form-control" type="text" name="choose3" id="choose3" >


<label  for="choose4"><h3>choose4 : </h3></label>
<input class="form-control" type="text" name="choose4" id="choose4" >


<label  for="chossen_answer :"><h3>Write the correct  answer here :</h3></label>
<input class="form-control" type="text" name="choosen_answer" id="chossen_answer"><b>



<label  for="degree"><h3>degree</h3></label>
<input class="form-control" type="text" name="degree"  id="degree"><br>


<input hidden="hidden" type="text" name="id_exam" value="{{$allExams->last()->id}}">
    <button class="btn btn-default" type="submit">create</button>
</form>
</div>

<!--/////////////////////////////////////////-->

<!--//////////////// end of Questions /////////////////////////-->
<div id="end_exam" align=right>
<form  action="examiner" method="POST" enctype="mulipart/form-data">
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<button class="btn btn-default" type="submit" onclick="javascript:alert('added sucessfully ')">End of exam</button>
</form>
</div>
<!--/////////////////////////////////////////-->



</div>
</div>
</div>
</div>







  <footer id="footer">
 
    <div class="container">
   <div class="row">
  <div class="footerbottom">
    <div class="col-md-3 col-sm-6">
      <div class="footerwidget">
        <h4>
          Course Categories
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li><a href="#">
                List of Technology 
              </a>
            </li>
            <li><a href="#">
                List of Business
              </a>
            </li>
            <li><a href="#">
                List of Photography
              </a>
            </li>
            <li><a href="#">
               List of Language
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="footerwidget">
        <h4>
          Products Categories
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li> <a href="#">
                Individual Plans  </a>
            </li>
            <li><a href="#">
                Business Plans
              </a>
            </li>
            <li><a href="#">
                Free Trial
              </a>
            </li>
            <li><a href="#">
                Academic
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="footerwidget">
        <h4>
          Browse by Categories
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li><a href="#">
                All Courses
              </a>
            </li>
            <li> <a href="#">
                All Instructors
              </a>
            </li>
            <li><a href="#">
                All Members
              </a>
            </li>
            <li>
              <a href="#">
                All Groups
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6"> 
              <div class="footerwidget"> 
                         <h4>Contact</h4> 
                        <p>Lorem reksi this dummy text unde omnis iste natus error sit volupum</p>
            <div class="contact-info"> 
            <i class="fa fa-map-marker"></i> Kerniles 416  - United Kingdom<br>
            <i class="fa fa-phone"></i>+00 123 156 711 <br>
             <i class="fa fa-envelope-o"></i> youremail@email.com
              </div> 
                </div><!-- end widget --> 
    </div>
  </div>
</div>
      <div class="social text-center">
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-flickr"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>
      </div>

      <div class="clear"></div>
      <!--CLEAR FLOATS-->
    </div>
    <div class="footer2">
      <div class="container">
        <div class="row">

          <div class="col-md-6 panel">
            <div class="panel-body">
              <p class="simplenav">
              <li><a href="{{url('examiner')}}">Home</a></li>
              <li><a href="{{url('about')}}">About</a></li>
              <li><a href="{{url('statistics')}}">statistics</a></li> |
              <li><a onclick="javascript:alert('free system ')">Price</a></li>
              <a href="videos.html">Videos</a> |
              <li><a href="{{url('contact')}}">Contact</a></li>
              </p>
            </div>
          </div>

          <div class="col-md-6 panel">
            <div class="panel-body">
              <p class="text-right">
                Copyright &copy; 2014. Template by <a href="http://webthemez.com/" rel="develop">WebThemez.com</a>
              </p>
            </div>
          </div>

        </div>
        <!-- /row of panels -->
      </div>
    </div>
  </footer>



 
<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
  <script type='text/javascript' src="{{asset('assets/js/jquery.js')}}"></script>
      <script src="{{asset('assets/js/modernizr-latest.js')}}"></script> 

    <script type='text/javascript' src="{{asset('assets/js/fancybox/jquery.fancybox.pack.js')}}"></script>
    
    <script type='text/javascript' src="{{asset('assets/js/jquery.mobile.customized.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script> 
    <script type='text/javascript' src="{{asset('assets/js/camera.min.js')}}"></script> 
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script> 
  <script src="{{asset('assets/js/custom.js')}}"></script>

    <script type="text/javascript">
 //document.getElementById("b").addEventListener("click",Question_area);
 var code_questionDiv=document.getElementById('code_question');
 var True_False_questionDiv=document.getElementById('True_False_question');
 var multiple_Choice_questionDiv=document.getElementById('multiple_Choice_question');

 var TFform =document.getElementById('TFform');
 var  MchoosForm =document.getElementById('MchoosForm');
 var formC =document.getElementById('codeForm');
$(document).ready(
function(){
    $("#TFform").hide();
    $("#MchoosForm").hide();
    $("#codeForm").hide();
}
);
function addCodeQuestion()
{
    
  $("#TFform").hide();
    $("#MchoosForm").hide();
    $("#codeForm").show();
} 

function addTrueFalseQuestion()
{
   $("#TFform").show();
    $("#MchoosForm").hide();
    $("#codeForm").hide();
}

function addmultiplechooseQoestion()
{  
   $("#TFform").hide();
    $("#MchoosForm").show();
    $("#codeForm").hide();
}
function doNothing()
{  
   $("#TFform").hide();
    $("#MchoosForm").hide();
    $("#codeForm").hide();
}


function addQuestion() {
 var selsectedOption=document.form1.Question_type.value; // get the chosen value
 if(selsectedOption==="True/false" ){addTrueFalseQuestion();}
 else if(selsectedOption==="code_question" ){addCodeQuestion();}
 else if(selsectedOption==="multiple choose" ){addmultiplechooseQoestion();}
 else if(selsectedOption==="doNothing" ){doNothing();}
}


</script>
</body>
</html>
@endsection