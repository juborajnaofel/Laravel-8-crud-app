<style>
div{
	padding:30px;
	background-color:rgba(0, 0, 0, 0.3);
	color:white;
}
a{
	text-decoration:none;
	color:white;
	background-color:blue;
	border:1px solid white;
	padding:10px;
}
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
</style>

<div align="center" >
	<h1>Successfully Deleted a row!</h1>

	<a href="{{ URL::to('/'); }}">Go to homepage</a>
</div>