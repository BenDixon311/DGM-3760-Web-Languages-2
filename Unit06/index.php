<?php
require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die('unable to connect');

$query = "SELECT * FROM comments WHERE approved=1 ORDER BY date";

$result = mysqli_query($dbconnect, $query) or die ('query failed, n00b');


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Employees</title>
		<link rel="stylesheet" href="style.css">
</head>

<body>
	
	
	<?php
		include_once('navbar.php');
	?>
	
	<div class="container">
	
		<form class="contact">
			
			<h1>Comments</h1>
			<br>
		
		<?php
			while($row = mysqli_fetch_array($result))
				  {
				
				echo '<article>';
				
				echo '<h3>'.$row['name'] . ' - '.$row['occupation'].'</h3>';
				
				echo '<i>'.$row['date'] . '</i><br>';
				echo $row['comment'] .'<br>';
				
				echo '</article><br>';
			}
			
		?>
		
		
		</form>
	
	</div>
	
	
</body>
	
		
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>
	

    



