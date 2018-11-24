<?php
require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die('unable to connect');

$query = "SELECT * FROM employee_db ORDER BY last ASC";

$result = mysqli_query($dbconnect, $query) or die ('failed, you suck');




?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Employees</title>
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	
	<?php
		include_once('navbar.php');
	?>
		
		<div class="container">

			<form class="contact">
	
	<?php
		while ($row = mysqli_fetch_array($result)) {
			
			echo '<h2> <a href="details.php?id='.$row['id'].'">';
			echo $row['last'] . ', '. $row['first']. '</a></h2> - '.$row['expertise'];
			
			
			
		
		}
	
	
	?>
		</form>
		
		</div>
	
</body>
	
	

</html>