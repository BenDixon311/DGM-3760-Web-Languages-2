<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Assignment 4 - Deleting Records</title>
	<link rel="stylesheet" href="style.css">

</head>

<body id="home">
	
	<div class="container">
		<form class="contact" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
		
		<h1>Select records to delete</h1>
			<br>

<?php
		//establish DB connection
$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');

			
//code for record deletion
if(isset($_POST['submit'])) {
	foreach($_POST['toDelete'] as $delete_id) {
		
		
		
		$deleteQuery = "DELETE FROM newsletter WHERE id=$delete_id";
		
		
		$result = mysqli_query($dbconnect, $deleteQuery) or die('unable to talk to database');
	}
	
};	
				
			
//build sql query
$myQuery= "SELECT * FROM newsletter";


//talk to DB
$result = mysqli_query($dbconnect, $myQuery) or die('unable to talk to database');
			
		
		
		//fetch all records in DB
		while($row = mysqli_fetch_array($result)) {
			
			echo '<label>';
			
			echo '<input type = "checkbox" value = "'.$row['id'].'" name = "toDelete[]" />';
			echo $row['name'] .' - '. $row['email'] . '<br>';
			
			echo '</label>';
			echo '<hr>';
		};
		
		
		
		

//close connection
mysqli_close($dbconnect);
		
		?>
			
			<br>

<button name = "submit" type="submit" id="contact-submit" data-submit="...Sending...">Delete Records</button>
			
</form>
	</div>
	
	
	
	
	

</body>
	
	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    




</html>