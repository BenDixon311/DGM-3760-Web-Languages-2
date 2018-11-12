<?php 
$employee_id=$_GET['id'];

$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');


$query = "SELECT * FROM Employees WHERE id = $employee_id";



$result = mysqli_query($dbconnect, $query) or die ('query failed, tho');

$found = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Update Employee</title>
	<link rel="stylesheet" href="style.css">

</head>

<body id="home">
	
	<!--navigation-->
	<div class="navigation">
		
		<ul class="myNav">
	<li><a href="viewall.php">View All Employees</a></li>
		
		<li><a href="delete.php">Delete Employee</a></li>
		
		<li><a href="index.html">Add Employee</a></li>
	</ul>
	</div>
	
<div class="container">
	
	
	
	<form class="contact" action="updateDB.php" method="POST" enctype="multipart/form-data">
		
		<h2>Update Employee</h2>
   

    <fieldset>
		<legend>NAME</legend>
		First Name: <input type = "text" name = "first" value="<?php echo $found['first'];?>"><br>
		Last Name: <input type = "text" name = "last"   value="<?php echo $found['last'];?>"><br>
		
		</fieldset>
		<fieldset>
			<legend>DETAILS</legend>
        Department: <select name="dept">
						<option> <?php echo $found['dept'];?></option>
						<option>------------</option>
						<option>Design</option>
						<option>Development</option>
						<option>Human Resources</option>
						<option>Management</option>
		
					</select><br>
        Phone: <input type="tel" name="phone"  value="<?php echo $found['phone'];?>"><br>
		</fieldset>
		
		
		<input type="hidden" name = "id" value = "<?php echo $employee_id; ?>">



    <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">Update Employee</button>
		
		
		
	</form>
	
	</div>
	