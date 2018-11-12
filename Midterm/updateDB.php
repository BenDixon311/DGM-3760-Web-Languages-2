<?php

$id = $_POST['id'];
$first = $_POST['first'];
$last = $_POST['last'];
$dept = $_POST['dept'];
$phone= $_POST['phone'];




	
	//establish DB connection
$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');

//build sql query
$myQuery= "UPDATE Employees SET first='$first', last='$last', dept='$dept', phone='$phone' WHERE id=$id";




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
		echo "<h2>$first $last</h2> <br>";
		echo "$dept <br>";
		echo "$phone";		
		
		
	
	?>
				
		</form>
	</div>

</body>
</html>