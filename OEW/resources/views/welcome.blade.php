<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="free-educational-responsive-web-template-webEdu">
    <meta name="author" content="webThemez.com">
    <title>OEW </title>
    <!--{!!Html::image('images/favicon.png')!!}-->
    {!!Html::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/bootstrap-theme.css')!!}
    {!!Html::style('css/style.css')!!}
    <link rel="stylesheet" href="{{asset('font/css/font-awesome.min.css')}}">

        <style> 
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
           }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
  

   

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
            
                @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                       <a href="{{ url('/home') }}">Home</a>
                    @else
                       <div  class="btn btn-default">  <a href="{{url('/login')}}" style="text-decoration:none"><font color="black"size=5>Login</font></a></div> 
                       <div  class="btn btn-default"><a href="{{url('/register')}}"style="text-decoration:none"><font color="black"size=5>Register</font></a></div>
                    @endif
                </div>
            @endif
                
            <!--/.nav-collapse -->
        </div>
    </div>
   
<div class="container" style="opacity:.9">
<div class="row">
<div class="panel panel-default">


        <div class="flex-center position-ref full-height">
           <div class="content">
                <div class="title m-b-md">
                   Thanks for visit
                </div>
            </div>

            <div >
                    <img src="{{asset('assets/images/logo.png')}}" alt="Techro HTML5 template"></a>
            </div>

           
</div>
</div>
</div>           
            

           

            

        </div>
    </body>
















































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
              <a href="courses.html">Courses</a> |
								<a href="price.html">Price</a> |
								<a href="videos.html">Videos</a> |
								<a href="contact.html">Contact</a>|
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



</html>
