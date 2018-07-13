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
    <link rel="stylesheet" href="{{asset('font/css/font-awesome.min.css')}}">
    {!!Html::style('css/bootstrap-theme.css')!!}
    {!!Html::style('css/style.css')!!}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{asset('images/logo.png')}}" alt="Techro HTML5 template"></a>
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
                    <li><a href="{{url('contact')}}">Contact</a></li>
                    </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->

 	<header id="head" class="secondary">
            <div class="container">
                    <h1>previous exams</h1>
                    <p>description:</p>
                </div>
    </header>



<div class="container" style="opacity:.9">
<div class="row">
<div class="panel panel-default">




@if(count($allExams)>0)
<table class="table">
<tr>
<th>exam name</th> 
<th> Grade</th>
<th> Exam time </th>

</tr>

@foreach($allExams as $exam)
<tr>
<!--exam name section  -->
<td>

<p>{{ $exam->name}}</p>
</td>

<td>

<p>{{ $exam->exam_grade}}</p>
</td>




<td>

<p>{{$exam->period}}</p>
</td>



<td>
<!-- show previous questions  -->

<form action="{{url('prev_exam',$exam->id)}}"method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<button class="btn btn-default" type="submit">show questions</button>
    </form>
</td>


<td>
<!-- show report  -->

<form action="{{url('examReport',$exam->id)}}"method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<button class="btn btn-default" type="submit">Follow-up of results</button>
    </form>
</td>

</tr>


@endforeach

</table>

@endif
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
              <li><a href="{{url('HomePageStudent')}}">Home</a></li>
              <li><a href="{{url('about')}}">About</a></li>
              <li><a href="{{url('statistics')}}">statistics</a></li>|
              <li><a onclick="javascript:alert('free system ')">Price</a></li>
              <a href="videos.html">Videos</a> |
            <a href="{{url('contact')}}">Contact</a>|
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

</body>
</html>
@endsection