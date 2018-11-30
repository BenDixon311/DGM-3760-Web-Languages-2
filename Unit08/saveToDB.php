
<?php 
$first = $_POST['first'];
$last = $_POST['last'];
$team = $_POST['team'];



require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die("unable to connect to db");


//build query
$query = "INSERT INTO west_players (first, last, team_id) VALUES ('$first','$last','$team')";

$result = mysqli_query($dbconnect, $query) or die ('query failed');

//select the id that was just inserted
$recent_id = mysqli_insert_id($dbconnect);

//loop through the array to get all position_id's
foreach($_POST['positions'] as $position_id) {
	
	
	$query = "INSERT INTO west_skills (id, position_id) VALUES ($recent_id, $position_id)";
	
	$result = mysqli_query($dbconnect, $query) or die ('update position query failed');
	
};// end foreach

//close DB
mysqli_close($dbconnect); 

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Added New Player</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	
	<?php include_once('navbar.php');?>
	
	<div class="container">
		<form class="contact">
		
			<p>You've added pro NBA player <?php echo $first .' '.$last ?> to the database.</p>
			
			<a href="addnewplayer.php" class="approve">Add another player</a>
		
		
		</form>
	
	</div>
	
	
</body>
</html>