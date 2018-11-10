<?php



$t = time();

$name = $_POST['name'];
$date = date("Y-m-d",$t);
$occupation = $_POST['occupation'];
$comment= $_POST['comment'];


require_once('variables.php');
	
	//establish DB connection
$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die('unable to connect to database');

//build sql query
$myQuery= "INSERT INTO comments(date, name, occupation, comment, approved) VALUES ('$date','$name','$occupation', '$comment', 0)";


//talk to DB
$result = mysqli_query($dbconnect, $myQuery);
	if ( false===$result ) {
  printf("error: %s\n", mysqli_error($dbconnect));
}


//close connection
mysqli_close($dbconnect);



?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Submission</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<?php
		include_once('navbar.php');
	?>
	
	<div class="container">

			<form class="contact">
	<?php
		echo "$name, your comment has been submitted for approval <br>";
		
	
	?>
				
		</form>
	</div>

</body>
</html>