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
	<h2>Edit Stock data table cell ( <b>Row:</b> {{$a}}, <b>Column:</b> {{$b}} )</h2>
		
	<div id="formwrapper">
		<form action="{{ URL::to('/'); }}\edit" method="POST">
			@csrf
			<input type="hidden" name="cellrow" value="{{$a}}"/>
			<input type="hidden" name="cellcol" value="{{$b}}"/>
			<input type="text" name="updatecell" value="{{$c}}"/><br><br>
			<input type="submit" name="submitdata" value="submit"/>
		</form>
	</div>

</div>
<br>
<br>
<div align="center">
<h5>This APP is developed by: I.E.U. Juboraj Naofel</h5>
</div>