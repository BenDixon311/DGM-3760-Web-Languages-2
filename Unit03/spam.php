<?php

$subject = $_POST[subject];
$msg = $_POST[message];
$from = "bendixon311@gmail.com";


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
	
	$name = $row['name'];
	$email = $row['email'];
	$message = "Dear $name, $msg";
	
	mail($email, $subject, $message);
	
	echo 'Message sent to: ' . $email . '<br>';
	
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
			<form class="contact">
	<h3>Spam has been sent!</h3>
				</form>
		</div>
	</body>
</html>