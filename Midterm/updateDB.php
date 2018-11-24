<?php

$id = $_POST['id'];
$first = $_POST['first'];
$last = $_POST['last'];
$expertise = $_POST['expertise'];
$phone= $_POST['phone'];
$email = $_POST['email'];
$description = $_POST['description'];
$photo = $_POST['photo'];

$noImage = false;
$filepath = 'employees/';

//if no image is selected to update
if($_FILES['photo']['size'] == 0) {
	$noImage = true;
}

//if new image is selected to update, check if valid
else {
	$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
	$filename = $first.$last.time().'.'.$ext;
 	
	$validImage = true;
	//check if too large
		if($_FILES['photo']['size'] > 204800){
			echo '<div class="container">
				<form class="contact"><h3>Image file size too large!';
			$validImage = false;
			}

		//check file format
			if($_FILES['photo']['type'] == 'image/gif' || $_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/pjpeg' || $_FILES['photo']['type'] == 'image/png') {
	
		//format is correct
			}
			else
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
			}
}

	
	//establish DB connection
require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die('unable to connect');

//build sql query

if ($noImage == true){
	$myQuery = "UPDATE employee_db SET first='$first', last='$last', expertise='$expertise', phone='$phone', email='$email', description='$description' WHERE id=$id";
}

else {
	$myQuery= "UPDATE employee_db SET first='$first', last='$last', expertise='$expertise', phone='$phone', email='$email', description='$description', photo='$filename' WHERE id=$id";
}





//talk to DB
$result = mysqli_query($dbconnect, $myQuery) or die('didnt work man');
	


//close connection
mysqli_close($dbconnect);
	



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
	
	<?php
		include_once('navbar.php');
	?>
	
	<div class="container">

			<form class="contact">
	<?php
				
			
		echo "$first $last <br>";
		echo '<img src="'.$filepath.$filename.'" /><br>';
				
		echo $phone. ' - '. $email;
		
		echo '<br>'.$description;
	
	?>
		
	
	
				
		</form>
	</div>

</body>
</html>