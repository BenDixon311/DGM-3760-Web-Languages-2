<?php

$first = $_POST['first'];
$last = $_POST['last'];
$expertise = $_POST['expertise'];
$phone= $_POST['phone'];
$email = $_POST['email'];
$description = $_POST['description'];
$photo = $_POST['photo'];


//photo path and name

 $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
 $filename = $first.$last.time().'.'.$ext;
 $filepath = 'employees/';


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
	move_uploaded_file($tmp_name, "$filepath$filename");
	
	@unlink($_FILES['photo']['tmp_name']);
	
	//establish DB connection
require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die('unable to connect');
//build sql query
$query= "INSERT INTO employee_db (first, last, expertise, phone, email, description, photo) VALUES ('$first', '$last', '$expertise', '$phone', '$email', '$description', '$filename')";


//talk to DB
$result = mysqli_query($dbconnect, $query);
	if ( false===$result ) {
  printf("error: %s\n", mysqli_error($dbconnect));
}


//close connection
mysqli_close($dbconnect);
	
}	
	else {
	//try again
		echo '<br><button><a href="index.html">Try again</a></button></h3></form></div>';
	};



?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Submission</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
	<!--navigation-->
	<?php
		include_once('navbar.php');
	?>
	
	<div class="container">

			<form class="contact">
	<?php
		echo '<h2>'.$found['first']. ' ' .$found['last'] . '</h2>';
		echo '<h4><i>'.$found['expertise'].'</i></h4>';
					
		echo '<img src="'.$filepath.$found['photo'].'" />';
		echo '<p>Phone: ';
		echo $found['phone'];
		echo '</p>';
		echo '<p>Email: ';
		echo '<a href="mailto:'.$found['email'].'">'.$found['email'].'</a>';
		echo '</p>';
		echo '<p>';
		echo $found['description'];
	
	?>
				
		</form>
	</div>

</body>
</html>