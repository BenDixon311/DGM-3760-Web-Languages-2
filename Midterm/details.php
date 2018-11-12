<?php

$employee_id = $_GET[id];
$filepath = 'employees/';

$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');


$query = "SELECT * FROM Employees WHERE id = $employee_id";



$result = mysqli_query($dbconnect, $query) or die ('query failed, tho');

$found = mysqli_fetch_array($result);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Record</title>
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
		echo '<h2>'.$found['first']. ' ' .$found['last'] . '</h2>';
				
		echo '<p>';
		echo $found['dept'].'<br>'.$found['phone'];
		echo '</p>';
				
				
		echo '<img src="'.$filepath.$found['photo'].'" />';
	
	?>
				
				>
		</form>
	</div>
	
</body>
</html>