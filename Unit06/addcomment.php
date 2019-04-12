<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Assignment 6 - Securing the Application</title>
	<link rel="stylesheet" href="style.css">

</head>

<body id="home">
	
	<?php include_once('navbar.php'); ?>
	
<div class="container">
	
	
	
	<form class="contact" action="add.php" method="POST" enctype="multipart/form-data">
		
		<h2>Add Comment</h2>
   

    <fieldset>
		<legend>NAME and OCCUPATION</legend>
		Full Name: <input type = "text" name = "name" required><br>
		Occupation <input type = "text" name = "occupation" required><br>
		
		</fieldset>
		<fieldset>
			<legend>COMMENT</legend>
       		<textarea name="comment" maxlength="500" required></textarea>
		</fieldset>
	

	

    <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">Add to Database</button>
		
		
		
	</form>
	
	</div>
	
	
	

</body>
	

    




</html>