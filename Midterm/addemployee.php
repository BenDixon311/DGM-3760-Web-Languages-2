<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Midterm - Employee Database</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body id="home">
	
	<!--navigation-->

	<?php
		include_once('navbar.php');
	?>
	
<div class="container">
	
	
	
	<form class="contact" action="add.php" method="POST" enctype="multipart/form-data">
		
		<h2>Add Employee</h2>
   

    <fieldset>
		<legend>NAME</legend>
		First Name: <input type = "text" name = "first" required><br>
		Last Name: <input type = "text" name = "last"  required><br>
		
		</fieldset>
		<fieldset>
			<legend>DETAILS</legend>
        Area of Expertise: <select name="expertise">
						<option>Design</option>
						<option>Development</option>
						<option>Marketing</option>
						<option>Management</option>
		
					</select><br>
        Phone: <input type="tel" name="phone" required><br>
			
		Email: <input type = "email" name = "email" required><br>
			
		Description: <textarea type="text" name="description" required></textarea>
		</fieldset>
		
		<fieldset>
			<legend>IMAGE</legend>
		Photo: <input type="file" name="photo">
			<br><span>image file format MUST be .jpg</span><br>
			<span>Maximum image size is 150px X 200px</span>
    </fieldset>
	



    <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">Add to Database</button>
		
		
		
	</form>
	
	</div>
	
	
	

</body>
	
	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    




</html>