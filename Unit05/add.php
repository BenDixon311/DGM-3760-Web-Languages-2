<?php

$first = $_POST['first'];
$last = $_POST['last'];
$dept = $_POST['dept'];
$phone= $_POST['phone'];
$photo = $_POST['photo'];


//photo path and name

 $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
 $filename = 'employees/'.$first.$last.'.'.$ext;


//---------------------verify image is valid-------------------
$validImage = true;
//check if image is missing
if($_FILES['photo']['size'] == 0) {
	echo '<div class="container">
		<form class="contact"><h3>Image not selected';
	$validImage = false;
};

//check if too large
if($_FILES['photo']['size'] > 204800){
	echo '<div class="container">
		<form class="contact"><h3>Image file size too large!';
	$validImage = false;
}

//check file format
if($_FILES['photo']['type'] == 'image/gif' || $_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/pjpeg' || $_FILES['photo']['type'] == 'image/png') {
	
	//format is correct
	
} else
	{
		//wrong file format
		echo '<div class="container">
		<form class="contact"><h3>Wrong Image File Format';
			$validImage = false;
	};

if ($validImage == true) {
	//upload file
	
	$tmp_name = $_FILES['photo']['tmp_name'];
	move_uploaded_file($tmp_name, $filename);
	
	@unlink($_FILES['photo']['tmp_name']);
}	
	else {
	//try again
		echo '<br><button><a href="index.html">Try again</a></button></h3></form></div>';
	};


//establish DB connection
//$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');

//build sql query
//$myQuery= "INSERT INTO Employees(first, last, dept, phone, photo) VALUES ('$first','$last','$dept', '$phone', '$photo')";


//talk to DB
//$result = mysqli_query($dbconnect, $myQuery) or die('unable to talk to database');

//close connection
//mysqli_close($dbconnect);

?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Submission</title>
	<link rel="stylesheet" href="style.css">
</head>
	
	

<body>
	
</body>
</html>