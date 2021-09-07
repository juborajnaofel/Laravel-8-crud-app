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








.dropbtn {
  background-color: white;
  color: black;
  padding: 10px;
  font-size: 12px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  max-width: 500px;
  min-width:160px;
  overflow: auto;
  overflow-y: scroll;
  max-height:500px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 5px 5px;
  text-decoration: none;
  display: block;
  font-size: 12px;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}




</style>
</head>
<body>

	
	
	<div id="Sitetitle">
		<br>
		<br>
		<h3 align="center">This APP is developed by:</h3><h1 align="center">I.E.U. Juboraj Naofel</h1>
		<br>
		<br>
	</div>
	
	
	<div style="border:1px solid grey; background-color:rgba(0, 0, 0, 0.3); padding:15px; color:white;" align="center">
		<h4>Graph of Stock Market Data</h4>
		<br><br>
		
	
		<div align="left">
			<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn">trade code dropdown</button>
				<div id="myDropdown" class="dropdown-content">
					@foreach ($tcdata as $tcd)
						  <a onclick="tc_data_change('<?php  echo $tcd; ?>')">{{ $tcd }}</a><br>
					@endforeach
				</div>
			</div>
			
		</div>
		<br>
		<div id="myPlot2" style="width:100%; height:400px;"></div>
		<div id="myPlot1" style="width:100%; height:400px;"></div>
	</div>
	
	

	
	
	


	
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
		var js_data = '<?php echo json_encode($graphdata); ?>';
		var js_obj_data = JSON.parse(js_data );
	</script>
	<script>
		function tc_data_change(value_tc){
			alert("Showing "+value_tc)
			update_graph_array(value_tc);
		}
		function update_graph_array(tcd_val){
			var date_array = [];
			var close_array = [];
			var volume_array = [];
			
			var i=0;
			for(i=0; i<js_obj_data.length;i++){
				if(tcd_val == js_obj_data[i]["trade_code"]){
					date_array[i] = js_obj_data[i]["date"];
					close_array[i] = js_obj_data[i]["close"]; 
					volume_array[i] = js_obj_data[i]["volume"];
				}
			}
			
			var  j;
			var k; 
			for (i = 0; i < js_obj_data.length - 1 ; i++){  
			for (j = 0; j < js_obj_data.length-i-1; j++){ 
					if (date_array[j] > date_array[j+1]){
						k = date_array[j];
						date_array[j] = date_array[j+1];
						date_array[j+1] = k;
						
						k = close_array[j];
						close_array[j] = close_array[j+1];
						close_array[j+1] = k;
						
						k = volume_array[j];
						volume_array[j] = volume_array[j+1];
						volume_array[j+1] = k;
					}
			
				}
			}

			updateplot1(date_array, close_array, volume_array);
			updateplot2(date_array, close_array, volume_array);

		}
	
		
		
		function updateplot1(date_array, close_array, volume_array){
			var xArray =  date_array;
			var xtitle = "date";
			var ytitle = "close";
			var yArray =  close_array;
			

			// Define Data
			var data = [{
			  x: xArray,
			  y: yArray,
			  mode:"lines"
			}];

			// Define Layout
			var layout = {
			  xaxis: {range: [Math.min(xArray),Math.max(xArray)], title: xtitle},
			  yaxis: {range: [Math.min(yArray),Math.max(yArray)], title: ytitle},  
			  title: xtitle+" vs. "+ytitle
			};

			// Display using Plotly
			Plotly.newPlot("myPlot1", data, layout);
		}
		
		
		function updateplot2(date_array, close_array, volume_array){
			var xArray =  date_array;
			var xtitle = "date";
			var ytitle = "volume";
			var yArray =  volume_array;
			


			// Define Layout
			var layout = {
			  xaxis: {range: [Math.min(xArray),Math.max(xArray)], title: xtitle},
			  yaxis: {range: [Math.min(yArray),Math.max(yArray)], title: ytitle},  
			  title: xtitle+" vs. "+ytitle
			};
			
			var trace1 = {
			  x: xArray,
			  y: yArray,
			  type:"bar",
			  orientation:"v",
			  name: 'Horizontal Bar chart',
			  marker: {color:"rgba(0,0,0,0.6)"}
			};

			var trace2 = {
			  x: xArray,
			  y: yArray,
			  name: 'Line Graph',
			  mode:"lines"
			};

			var data = [trace1, trace2];

			var layout = {
			  title: xtitle+" vs. "+ytitle,
			  yaxis: {title: 'Volume'},
			  yaxis2: {
				title: 'Volume',
				titlefont: {color: 'rgb(148, 103, 189)'},
				tickfont: {color: 'rgb(148, 103, 189)'},
				overlaying: 'y',
				side: 'right'
			  }
			};

			// Display using Plotly
			Plotly.newPlot("myPlot2", data, layout);
		}
		tc_data_change(js_obj_data[0]["trade_code"]);
	</script>	  
	  
	<script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
		  document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbtn')) {
			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
			  var openDropdown = dropdowns[i];
			  if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			  }
			}
		  }
		}
	</script>  
	  
	  
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