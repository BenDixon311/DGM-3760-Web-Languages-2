<?php

$employee_id = $_GET[id];
$filepath = 'employees/';

require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die('unable to connect');


$query = "SELECT * FROM employee_db WHERE id = $employee_id";



$result = mysqli_query($dbconnect, $query) or die ('query failed, tho');

$found = mysqli_fetch_array($result);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Record</title>
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
		echo '<h2>'.$found['first']. ' ' .$found['last'] . '</h2>';
		echo '<h4><i>'.$found['expertise'].'</i></h4>';
					
		echo '<img src="'.$filepath.$found['photo'].'" />';
		echo '<p>Phone: ';
		echo $found['phone'];
		echo '</p>';
		echo '<p>Email: ';
		echo '<a href="mailto:'.$found['email'].'">'.$found['email'].'</a>';
		echo '</p>';
		echo '<p>';
		echo $found['description'];
	
	?>
				
				
		</form>
	</div> 
	
</body>
</html>