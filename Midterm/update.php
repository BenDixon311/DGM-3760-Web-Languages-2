<?php 
$employee_id=$_GET['id'];

require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die('unable to connect');

$query = "SELECT * FROM employee_db WHERE id = $employee_id";



$result = mysqli_query($dbconnect, $query) or die ('query failed, tho');

$found = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Update Employee</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body id="home">
	
	<?php
		include_once('navbar.php');
	?>
	
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
						<option> <?php echo $found['expertise'];?></option>
						<option>------------</option>
						<option>Design</option>
						<option>Development</option>
						<option>Marketing</option>
						<option>Management</option>
		
					</select><br>
        Phone: <input type="tel" name="phone"  value="<?php echo $found['phone'];?>"><br>
		</fieldset>
		
		Email: <input type = "email" name = "email" value="<?php echo $found['email'];?>"><br>
			
		Description: <textarea type="text" name="description"><?php echo $found['description'];?></textarea>
		</fieldset>
		
		<fieldset>
			<legend>IMAGE</legend>
		Photo: <input type="file" name="photo">
			<br><span>image file format MUST be .jpg</span><br>
			<span>Maximum image size is 150px X 200px</span>
    </fieldset>
		
		
		<input type="hidden" name = "id" value = "<?php echo $employee_id; ?>">



    <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">Update Employee</button>
		
		
		
	</form>
	
	</div>
	