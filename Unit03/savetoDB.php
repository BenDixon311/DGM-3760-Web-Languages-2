<?php
$gender = $_POST['gender'];
$name = $_POST['name'];
$email = $_POST['emailaddress'];
$phone= $_POST['phone'];
$color = $_POST['favcolor'];

//establish DB connection
$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to db');

//build sql query
$myQuery= "INSERT INTO `test_inquiries`(`gender`, `name`, `email`, `phone`, `color`) VALUES ('$gender','$name','$email','$phone','$color')";


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
			<form id="contact">
	<h3><?php echo $name; ?>, you've been added to the database</h3>
				</form>
		</div>
	</body>
</html>
