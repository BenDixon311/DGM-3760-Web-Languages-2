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
$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');

//build sql query
$myQuery= "INSERT INTO employee_db(first, last, expertise, phone, email, description, photo) VALUES ('$first', '$last', '$expertise', '$phone', '$email', '$description', $filename')";

echo $first;
echo $last;
echo $expertise;
echo $phone;
echo $email;
echo $description;
echo $filename;
//talk to DB
//$result = mysqli_query($dbconnect, $myQuery);
//	if ( false===$result ) {
//  printf("error: %s\n", mysqli_error($dbconnect));
//}


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
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<!--navigation-->
	<div class="navigation">
		
		<ul class="myNav">
	<li><a href="viewall.php">View All Employees</a></li>
		
		<li><a href="delete.php">Delete Employee</a></li>
		
		<li><a href="index.html">Add Employee</a></li>
	</ul>
	</div>
	
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