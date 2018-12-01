

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add New Pokemon</title>
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
	
	
	
	<form class="contact" action="saveToDB.php" method="POST" enctype="multipart/form-data">
	
	
	
	
	
<div class="container">
	
	
	
	<form class="contact" action="add.php" method="POST" enctype="multipart/form-data">
		
		<h2>Add Pokemon</h2>
   

    <fieldset>
		<legend>NAME</legend>
		First Name: <input type = "text" name = "name" required><br>
		
		
		</fieldset>
		<fieldset>
			<legend>DETAILS</legend>
       
        
			Type
			<select name = "type">
			<option>Please select...</option>
				<option>Normal</option>
				<option>Fire</option>
				<option>Fighting</option>
				<option>Water</option>
				<option>Flying</option>
				<option>Grass</option>
				<option>Poison</option>
				<option>Electric</option>
				<option>Ground</option>
				<option>Psychic</option>
				<option>Rock</option>
				<option>Ice</option>
				<option>Bug</option>
				<option>Dragon</option>
				<option>Ghost</option>
				<option>Dark</option>
				<option>Steel</option>
				<option>Fairy</option>
			</select>
			
			<br>
			<br>
				
			<legend>NOTES</legend>
				<textarea name = "notes"></textarea>
	
	
	
	
	
	
	
	
			
			
			
			
			



    <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">Add to Database</button>
		
		
		
	</form>
	
	</div>
	
	
	

</body>
	
	


    




</html>