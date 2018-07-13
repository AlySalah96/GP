<html>
<head>
<title> grade report</title>
</head>

<body>
<h2 align="center">Grads report</h2></br>
<?php $i=0  ?>
@foreach($exam_name as $ex)
<h3>{{$ex->name}} exam</h3>
@endforeach 

<div style="width: 80%; margin: 0px auto;">

@if($students_names !=null)
<div style="float:left">
<h3 style="margin-right:20px;">name</h3>
<table >
@foreach($students_names as $n=>$v)
<tr >
<td> <?php echo ++$i  ?>--</td>

<td width="100">
{{ $v[0]->name }}
------------------------------------------------

</td>
</tr>
@endforeach
@endif
</table>
</div>



@if(count($students_grades) >0)

<div style="float:left">
<table>
<tr><td width="100" align="right"><h3 >Grad</h3></td></tr>
@foreach($students_grades as $G )
<tr >
<td width="100" align="right">{{$G->studentGrade}}</td>
------------------------------------------------
</tr>
@endforeach
@endif
</table>
</div>

</div>
</body>
</html>