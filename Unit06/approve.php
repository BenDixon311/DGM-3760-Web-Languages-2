<?php

require_once('authorize.php');

require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die('unable to connect');

$query = "SELECT * FROM comments WHERE approved=0 ORDER BY date";

$result = mysqli_query($dbconnect, $query) or die ('query failed, n00b');


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Approve</title>
	<link rel="stylesheet" href="style.css">
</head>

	<?php
		include_once('navbar.php');
	?>
	
	<div class="container">
	
		<form class="contact">
			
			<h1>Comments to Approve</h1>
			<br>
		
		<?php
			
			if(mysqli_num_rows($result) == 0) {
				echo '<h2>No comments to approve at this time</h2>';
			}
			else 
			{
			while($row = mysqli_fetch_array($result))
				  {
				
				echo '<article>';
				
				echo '<h3>'.$row['name'] . ' - '.$row['occupation'].'</h3>';
				
				echo '<i>'.$row['date'] . '</i><br>';
				echo $row['comment'] .'<br><br>';
			
				
				echo '<a class="approve" href=approve2.php?id='.$row['id'].'>Approve</a>';
				
				echo '<a class="delete" href=confirmdelete.php?id='.$row['id'].'>Delete</a>';
				echo '</article><br>';
			}
		}
			
			
		?>
		
		
		</form>
	
	</div>
	
<body>
</body>
</html>