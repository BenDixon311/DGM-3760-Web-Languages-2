
<?php 
$name = $_POST['name'];
$type = $_POST['type'];
$notes = $_POST['notes'];



require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die("unable to connect to db");


//build query
$query = "INSERT INTO pokemon (name, type, notes) VALUES ('$name','$type','$notes')";

$result = mysqli_query($dbconnect, $query) or die ('query failed');

//select the id that was just inserted
$recent_id = mysqli_insert_id($dbconnect);



//close DB
mysqli_close($dbconnect); 

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Added New Pokemon</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	
	<?php include_once('navbar.php');?>
	
	<div class="container">
		<form class="contact">
		
			<p>You've added the pokemon <?php echo $name ?> to the database.</p>
			
			<a href="add.php" class="approve">Add another pokemon</a>
		
		
		</form>
	
	</div>
	
	
</body>
</html>