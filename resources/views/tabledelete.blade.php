<head>
	<style>
		body{
			padding:0px;
			margin:0px;
		}
		#formwrapper{
			text-align:center;
		}
		#formwrapper form{
			width:100%;
		}
		#mainwrapper{
			background-color:grey;
			padding:20px;
			color:white;
		}
	</style>
</head>


<div align="center" id="mainwrapper">
	<h1>Update a table cell here</h2>
	<h2>Edit Stock data table cell ( <b>Row:</b> {{$a}})</h2>
		
	<div id="formwrapper">
		<form action="{{ URL::to('/'); }}\delete" method="POST">
			@csrf
			<input type="text" name="cellrow" value="{{$a}}"/>
			<input type="submit" name="submitdata" value="Delete row"/>
		</form>
	</div>

</div>
<br>
<br>
<div align="center">
<h5>This APP is developed by: I.E.U. Juboraj Naofel</h5>
</div>