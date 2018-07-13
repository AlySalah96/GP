@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<?php  $i=1;?>
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
    <style type="text/css">
     .inline {
            opacity:1;
            text-align:right;
            display:inline; 
          }
     #demo{
            opacity:1;
            text-align:left;
            display:inline;
            margin: 80px;
          }
    </style>
</head>
<body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{asset('assets/images/logo.png')}}" alt="Techro HTML5 template"></a>
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
                <li><a href="videos.html">Videos</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="#">Dummy Link1</a></li>
                            <li><a href="#">Dummy Link2</a></li>
                            <li><a href="#">Dummy Link3</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('contact')}}">Contact</a></li>
                    </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->

 	<header id="head" class="secondary">
            <div class="container">
                         
    <!---/////////// Display the countdown timer in an element/////////////-->
                    
                    <h2 class="inline">exam duration is: {{$exam->period}}</h2>
                    <h2 id="timer"></h2>
                    
                </div>
    </header>






<div class="container" style="opacity:.9">
<div class="row">
<div class="panel panel-default">



</div>

<h1>{{$exam->name }} exam</h1>
<br>


<form action="{{route('exam.answer')}}" method="post">
    {!! csrf_field() !!}
<table class="table">

@if(count($trueFalse_questions)>0)
@foreach($trueFalse_questions as $question )
<tr><td><span><h3><?php  echo $i;?>--
{{$question->content}}</h3></span><tr><td>
<tr><td><input type="hidden" name="question[]" value="{{$question->id}}"/></td></tr>
<tr><td><input  type ="radio" name="answer_{{$question->id}}" value="True">True</td></tr>
<tr><td><input  type ="radio" name="answer_{{$question->id}}" value="False">False </td><tr>
<tr><td><input type="hidden" name="exam_id" value="{{$exam->id}}"/><td><tr>
<tr><td> <input type="hidden" name="question_type" value="{{$question->type}}"/></td></tr>
<tr><td> <input type="hidden" name="student_id" value="{{Auth::user()->id}}"/></td></tr>
<br>
<?php   $i ++;?>
@endforeach   
@endif   


@if(count($multiple_choise_questions)>0)  
@foreach($multiple_choise_questions as $question2 )
<tr><td> <span><h3><?php  echo $i;?>--
{{$question2->content }}</h3></span></td></tr>
 <input type="hidden" name="question2[]" value="{{$question2->id}}"/>
<tr><td><input  type ="radio" name="answer_{{$question2->id}}" value="{{$question2->choose1}}">{{$question2->choose1}}</td></tr>
<tr><td><input  type ="radio" name="answer_{{$question2->id}}" value="{{$question2->choose2}}">{{$question2->choose2}}</td></tr>
<tr><td><input  type ="radio" name="answer_{{$question2->id}}" value="{{$question2->choose3}}">{{$question2->choose3}}</td></tr>
<tr><td><input  type ="radio" name="answer_{{$question2->id}}" value="{{$question2->choose4}}">{{$question2->choose4}}</td></tr>
<tr><td><input type="hidden" name="question2_type" value="{{$question2->type}}"/></td></tr>
<tr><td><input type="hidden" name="exam_id2" value="{{$exam->id}}"/></td></tr>
<tr><td> <input type="hidden" name="student_id" value="{{Auth::user()->id}}"/></td></tr>
<?php $i++;?>

@endforeach   
@endif 
  
   
    
    
<!--//////t->f/////////////////// Coding question //////////////////////// -->
 

@if(count($all_questions)>0 )
<table class="table">


<tr>
<th><b>the question content</b></th>
<th><b>language</></th>
<th> <b>grade</b> </th>
</tr>

@foreach($all_questions as $Codequestion)

<tr>
<td>

<span> <h3>
<?php  echo $i;?>--{{$Codequestion->content }} </h3></span>
<br>
<textarea style="width:500; height:310; "   type="text" name="student_answer{{$Codequestion->id }}"cols="120" rows="25"  placeHolder="please type your answer here"> </textarea><br>
<input type="hidden" name="codequestionID[]" value="{{$Codequestion->id}}"/>
</td>

<th>{{ $Codequestion->language }}</th>
<input type="hidden" name="language" value="{{$Codequestion->language}}"/>
<td>{{$Codequestion->degree}}</td>
<td> <input type="hidden" name="student_id" value="{{Auth::user()->id}}"/></td>
<td><input type="hidden" name="exam_id3" value="{{$exam->id}}"/></td>
</tr>

<?php  $i++;?>


@endforeach

@endif


 <!-- ////////////////////////////////////////////////////////////////////////////////-->
 <tr><td>  <input  id ="btn1" type="submit" class="btn btn-default"> </td></tr>
</table>
 </form> 
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
								<a href="price.html">Price</a> |
								<a href="videos.html">Videos</a> |
								<a href="contact.html">Contact</a>
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

<h1><div id="test"></div></h1>

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script type='text/javascript' src="{{asset('assets/js/jquery.js')}}"></script>
    	<script src="{{asset('assets/js/modernizr-latest.js')}}"></script> 

    <script type='text/javascript' src="{{asset('assets/js/fancybox/jquery.fancybox.pack.js')}}"></script>
    
    <script type='text/javascript' src="{{asset('assets/js/jquery.mobile.customized.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script> 
    <script type='text/javascript' src="{{asset('assets/js/camera.min.js')}}"></script> 
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script> 
    <script src="{{asset('assets/js/custom.js')}}"></script>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>




<script>
   var ExamDuration = "<?php echo $exam->period; ?>";
    function incTimer() {
        var currentHours = Math.floor(totalSecs / 3600);
        var currentMinutes =Math.floor(totalSecs / 60);
        var currentMinutes =Math.floor(currentMinutes % 60);
        if(totalSecs % 3600 == 0){ currentMinutes =0;}
        //else currentMinutes = 
        var currentSeconds = totalSecs % 60;
        if(currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
        if(currentMinutes <= 9) currentMinutes = "0" + currentMinutes;
        if(currentHours <= 9) currentHours = "0" + currentHours;
        totalSecs++;
        $("#timer").text("Elapsed Time is : " + currentHours + ":" + currentMinutes + ":" + currentSeconds  );
       var x=currentHours + ":" + currentMinutes + ":" + currentSeconds;
         if(x == ExamDuration)
         {

          $('#btn1').trigger('click'); 

         }
      
        setTimeout('incTimer()', 1000);
    }

    totalSecs = 0;
    currentMinutes=0;
    //currentHours =0;

    $(document).ready(function() {
        // $("#start").click(function() {
            incTimer();
        // });
    });
    
</script>



</body>
</html>
@endsection