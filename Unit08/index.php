<?php
require_once('variables.php');



	$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die("unable to connect to db");

//get team names
$query = "SELECT * FROM west_teams";
$resultTeams = mysqli_query($dbconnect, $query) or die('failed to query teams');

//get position names
$query = "SELECT * FROM west_positions ORDER BY position_name ASC";
$resultPositions = mysqli_query($dbconnect, $query) or die ('failed to query positions');


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
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
		
		<h2>Add Player</h2>
   

    <fieldset>
		<legend>NAME</legend>
		First Name: <input type = "text" name = "first" required><br>
		Last Name: <input type = "text" name = "last"  required><br>
		
		</fieldset>
		<fieldset>
			<legend>DETAILS</legend>
       
        
			Select Team:
			<select name = "team">
			<option>Please select...</option>
			
			
			<?php
			while($row = mysqli_fetch_array($resultTeams)) {
				echo '<option value= "'.$row['team_id'].'">'.$row['team_name'].'</option>';
			}
			
			?>
			</select><br>
			
			Select Positions<br>
			<?php
			while($row = mysqli_fetch_array($resultPositions)) {
				echo '<label><input type = "checkbox" value = "'.$row['position_id'].'" name = "positions[]">'.$row['position_name'].'</label><br>';
			}
			
			?>
			
			



    <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">Add to Database</button>
		
		
		
	</form>
	
	</div>
	
	
	

</body>
	
	


    




</html>