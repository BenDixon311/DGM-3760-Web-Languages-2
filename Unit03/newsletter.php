<?php

$name = $_POST['name'];
$email = $_POST['emailaddress'];
$phone= $_POST['phone'];


//establish DB connection
$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');

//build sql query
$myQuery= "INSERT INTO newsletter(name, email, phone) VALUES ('$name','$email','$phone')";


//talk to DB
$result = mysqli_query($dbconnect, $myQuery) or die('unable to talk to database');

//close connection
mysqli_close($dbconnect);

?>


<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
		<title>Submission confirmed!</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
		<div class="container">
			<form class="contact">
	<h3><?php echo $name; ?>, Thanks for signing up for the newsletter!</h3>
				</form>
		</div>
	</body>
</html>
