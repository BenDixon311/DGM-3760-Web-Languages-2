<?php

//establish DB connection
$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');


//build query
$query = "SELECT * FROM newsletter";

//talk to DB
$result = mysqli_query($dbconnect, $query) or die('unable to talk to database');

//close connection
mysqli_close($dbconnect);

//display table
while ($row = mysqli_fetch_array($result)){
	
	echo $row['name'];
	echo $row['email'];
	
}



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
	<h3>Spam has been sent!</h3>
				</form>
		</div>
	</body>
</html>