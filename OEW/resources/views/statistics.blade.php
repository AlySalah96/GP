<html>
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    {!!Html::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    <link rel="stylesheet" href="{{asset('font/css/font-awesome.min.css')}}">
    {!!Html::style('css/bootstrap-theme.css')!!}
    {!!Html::style('css/style.css')!!}
  <style>
  .center-div
{
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100px;
  height: 100px;
  background-color: #ccc;
  border-radius: 3px;
}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>   

<script text/javascript>
var char_data=<?php  echo $chart_data; ?>;

google.charts.load('current', {'packages':['bar']});
 google.charts.setOnLoadCallback(drawChart1);
 function drawChart1() 
 {
        var char_data1 = google.visualization.arrayToDataTable(char_data);
        var options = {
          title: 'average students grades in exams ',
         // curveType: 'function',
          legend: { position: 'top' ,textStyle: {color: 'red', fontSize: 16}}
                      };
         var bar = new google.charts.Bar(document.getElementById('bar-chart'));
        bar.draw(char_data1, google.charts.Bar.convertOptions(options));
}

google.charts.load('current', {'packages':['corechart']});
 google.charts.setOnLoadCallback(drawChart);
 function drawChart() 
 {
       //console.log(char_data);
        var char_data1 = google.visualization.arrayToDataTable(char_data);
        var options = {
          title: 'average students grades in exams ',
          curveType: 'function',
          legend: { position: 'bottom' }
                      };
        var chart = new google.visualization.LineChart(document.getElementById('linechart'));
        chart.draw(char_data1,options);
     
}



 </script>  
</head>
  <body>
  

 <div align="center">
    <div id="linechart" style="width: 900px; height: 500px;"> </div><br>

    <div id="bar-chart" style="width: 900px; height: 500px;" > </div>
 
</div>


<h2> Go back to Home page  </h2>
@if(Auth::user()->role==1)
<form action="{{url('examiner')}}" type="post">
@else
<form action="{{url('showExams')}}" type="post">
@endif
<button class="btn btn-default" >GO</button>
</form>

   
  </body>
</html>