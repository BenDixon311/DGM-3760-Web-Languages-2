<?php

$employee_id = $_GET[id];


$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');

if(isset($_POST['submit'])) {
	
	$query = "DELETE FROM employee_db WHERE id=$_POST[id]";
	
	
	
	$result = mysqli_query($dbconnect, $query) or die ('didnt connect to DB after submit');
	
	@unlink($_POST['photo']);
	
	//redirect after deltion
	header("Location: http://dgm3760.bendixondev.com/Midterm/delete.php");
	
	exit; //make sure next query doesn't try to execute
}

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

			<form class="contact" action="confirmdelete.php" method="POST" enctype="multipart/form-data">
	<?php
		echo '<h2>'.$found['first']. ' ' .$found['last'] . '</h2>';
				
		echo '<p>';
		echo $found['dept'].'<br>'.$found['phone'];
		echo '</p>';
	
	?>
				<input type="hidden" name="photo" value="employees/<?php echo $found['photo'];?>">
				<input type="hidden" name="id" value="<?php echo $found['id'];?>">
				
				 <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">DELETE RECORD</button>
				
				<br> <a href="delete.php">Cancel</a>
		</form>
	</div>
	
</body>
</html>