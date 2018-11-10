<?php
$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');

$query = "SELECT * FROM Employees ORDER BY last ASC";

$result = mysqli_query($dbconnect, $query) or die ('failed, you suck');




?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Employee Records</title>
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
		while ($row = mysqli_fetch_array($result)) {
			
			echo '<p>';
			echo $row['last'] . ', '. $row['first']. ' - '.$row['dept'];
			
			echo ' - <a href="confirmdelete.php?id='.$row['id'].'">DELETE</a>';
			
			echo '</p>';
		}
	
	
	?>
			
			</div>
	</div>
	
</body>
</html>