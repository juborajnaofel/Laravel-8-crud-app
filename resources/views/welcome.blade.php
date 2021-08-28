<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<style>
body{
	font-family: Arial, Helvetica, sans-serif;
	padding:20px;
	background-image: url('images/back.jpg'); /* The image used */
	background-color: #cccccc; /* Used if the image is unavailable */
	height: 500px; /* You must set a specified height */
	background-position: center; /* Center the image */
	background-attachment: fixed;
	background-repeat: no-repeat; /* Do not repeat the image */
	background-size: cover; /* Resize the background image to cover the entire container */
}
table{
	width:100%;
}
th,td{
	width:10%;
}
th{
	background-color:grey;
	color:white;
}
td{
	background-color:#d0d9d2;
	color:black;
}
td a{
	text-decoration:none;
	color:black;
}
.w-5{
	display: none;
}
#paginationlink{
	text-align: center;
}
#paginationlink a{
	padding:2px;
	margin:2px;
	background-color:#d0d9d2;
	color:black;
	text-decoration:none;
	border:1px solid grey;
}

</style>
</head>
<body>
	<br>
	<br>
	<h3 align="center">This APP is developed by:</h3><h1 align="center">I.E.U. Juboraj Naofel</h1>
	<br>
	<br>
	<?php 		
	$a1=array();
	$a2=array();
	$a3=array();
	$a4=array();
	$a5=array();
	$a6=array();
	$a7=array();
	$a8=array();
	
	?>
	@foreach ($data as $d1)


		<?php 
		  array_push($a1,$d1['id']);
		  array_push($a2,$d1['date']);
		  array_push($a3,$d1['trade_code']);
		  array_push($a4,$d1['high']);
		  array_push($a5,$d1['low']);
		  array_push($a6,$d1['open']);
		  array_push($a7,$d1['close']);
		  array_push($a8,$d1['volume']);
		 ?>
    @endforeach
	
	<script type='text/javascript'>
	<?php
	$js_array1 = json_encode($a1);
	$js_array2 = json_encode($a2);
	$js_array3 = json_encode($a3);
	$js_array4 = json_encode($a4);
	$js_array5 = json_encode($a5);
	$js_array6 = json_encode($a6);
	$js_array7 = json_encode($a7);
	$js_array8 = json_encode($a8);
	
	echo "var javascript_array1 = ". $js_array1 . ";\n";
	echo "var javascript_array2 = ". $js_array2 . ";\n";
	echo "var javascript_array3 = ". $js_array3 . ";\n";
	echo "var javascript_array4 = ". $js_array4 . ";\n";
	echo "var javascript_array5 = ". $js_array5 . ";\n";
	echo "var javascript_array6 = ". $js_array6 . ";\n";
	echo "var javascript_array7 = ". $js_array7 . ";\n";
	echo "var javascript_array8 = ". $js_array8 . ";\n";
	?>
	</script>
	
	<div style="border:1px solid grey; background-color:rgba(0, 0, 0, 0.3); padding:15px; color:white;" align="center">
		<h4>Graph of Stock Market Data</h4>
		<div align="center">
		  X axis:<button id="4" onclick="funcountx()">>></button>
		  &nbsp &nbsp 
		  Y axis:<button id="4" onclick="funcounty()">>></button>
		</div>
		<br>
		<div id="myPlot" style="width:80%; height:300px;"></div>
	</div>
	
	<script>
	var countitx = 1;
	var countity = 3;
	function funcountx(){
		countitx+=1;
		if(countitx>7){
			countitx= 0;
		}
		updateplot();
	}
	function funcounty(){
		countity++;
		if(countity>7){
			countity = 0;
		}
		updateplot();
	}
	function updateplot(){
		if(countitx==0){
			var xArray =  javascript_array1;
			var xtitle = "id";
		}else if(countitx==1){
			var xArray =  javascript_array2;
			var xtitle = "date";
		}else if(countitx==2){
			var xArray =  javascript_array3;
			var xtitle = "trade_code";
		}else if(countitx==3){
			var xArray =  javascript_array4;
			var xtitle = "high";
		}else if(countitx==4){
			var xArray =  javascript_array5;
			var xtitle = "low";
		}else if(countitx==5){
			var xArray =  javascript_array6;
			var xtitle = "open";
		}else if(countitx==6){
			var xArray =  javascript_array7;
			var xtitle = "close";
		}else if(countitx==7){
			var xArray =  javascript_array8;
			var xtitle = "volume";
		}
		
		
		if(countity==0){
			var yArray =  javascript_array1;
			var ytitle = "id";
		}else if(countity==1){
			var yArray =  javascript_array2;
			var ytitle = "date";
		}else if(countity==2){
			var yArray =  javascript_array3;
			var ytitle = "trade_code";
		}else if(countity==3){
			var yArray =  javascript_array4;
			var ytitle = "high";
		}else if(countity==4){
			var yArray =  javascript_array5;
			var ytitle = "low";
		}else if(countity==5){
			var yArray =  javascript_array6;
			var ytitle = "open";
		}else if(countity==6){
			var ytitle = "close";
			var yArray =  javascript_array7;
		}else if(countity==7){
			var yArray =  javascript_array8;
			var ytitle = "volume";
		}	
		

		// Define Data
		var data = [{
		  x: xArray,
		  y: yArray,
		  mode:"lines"
		}];

		// Define Layout
		var layout = {
		  xaxis: {range: [Math.min(javascript_array1),Math.max(javascript_array1)], title: xtitle},
		  yaxis: {range: [Math.min(javascript_array2),Math.max(javascript_array2)], title: ytitle},  
		  title: xtitle+" vs. "+ytitle
		};

		// Display using Plotly
		Plotly.newPlot("myPlot", data, layout);
	}
	updateplot();
	</script>

	
	<br>
	<br>
	<div style="border:1px solid grey; background-color:rgba(0, 0, 0, 0.3); padding:15px;" >
	<h3>Table for stock market data:</h3>
	<table border = 1>
	<thead>
		<tr>
		  <th>Table row id</th>
		  <th>Date</th>
		  <th>Trade code</th>
		  <th>High</th>
		  <th>Low</th>
		  <th>Open</th>
		  <th>Close</th>
		  <th>Volume</th>
		  <th>Delete row</th>
		</tr>
	  </thead>
	  <tbody>
         @foreach ($data as $d)
		<tr>
		  <td><a onmouseover="bigImg(this)" onmouseout="normalImg(this)" href="table/{{ $d['id'] }}/id/{{ $d['id'] }}">{{ $d['id'] }}</a></td>
		  <td><a onmouseover="bigImg(this)" onmouseout="normalImg(this)" href="table/{{ $d['id'] }}/date/{{ $d['date'] }}">{{ $d['date'] }}</a></td>
		  <td><a onmouseover="bigImg(this)" onmouseout="normalImg(this)" href="table/{{ $d['id'] }}/trade_code/{{ $d['trade_code'] }}">{{ $d['trade_code'] }}</a></td>
		  <td><a onmouseover="bigImg(this)" onmouseout="normalImg(this)" href="table/{{ $d['id'] }}/high/{{ $d['high'] }}">{{ $d['high'] }}</a></td>
		  <td><a onmouseover="bigImg(this)" onmouseout="normalImg(this)" href="table/{{ $d['id'] }}/low/{{ $d['low'] }}">{{ $d['low'] }}</a></td>
		  <td><a onmouseover="bigImg(this)" onmouseout="normalImg(this)" href="table/{{ $d['id'] }}/open/{{ $d['open'] }}">{{ $d['open'] }}</a></td>
		  <td><a onmouseover="bigImg(this)" onmouseout="normalImg(this)" href="table/{{ $d['id'] }}/close/{{ $d['close'] }}">{{ $d['close'] }}</a></td>
		  <td><a onmouseover="bigImg(this)" onmouseout="normalImg(this)" href="table/{{ $d['id'] }}/volume/{{ $d['volume'] }}">{{ $d['volume'] }}</a></td>
		  <td><a  href="table/{{ $d['id'] }}">Delete</a></td>
		</tr>
         @endforeach
	  </tbody>
      </table>
	  </div>
	  <br>
	  <div id="paginationlink">
		{{$data->links()}}
	  </div>
	  
	  
	  
	  
	  
	<script>
		function bigImg(x) {
			y = x.innerHTML;
			x.innerHTML = y+" - edit";
		  
		}

		function normalImg(x) {
		  x.innerHTML = y;
		}
		function fun(j){
			k = j.innerHTML
			j.innerHTML = "<input type='text' value='"+k+"'/>"
		}
	</script>
	<br>
	<br>
	<br>
	<div align="center">
	<p >This site is developed by I.E.U. Juboraj Naofel</p>
	</div>
</body>
</html>