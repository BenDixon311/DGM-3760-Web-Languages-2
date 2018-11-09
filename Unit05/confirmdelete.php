<?php

$employee_id = $_GET[id];


$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');

if(isset($_POST['submit'])) {
	
	$query = "DELETE * FROM Employee WHERE id=$_POST['id']";
}

$query = "SELECT * FROM Employee WHERE id = $employee_id";

$result = mysqli_query($dbconnect, $query) or die ('query failed, you suck');

$found = mysqli_fetch_array($result);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Record</title>
		<link rel="stylesheet" href="style.css">
</head>

<body>
	
	<div class="container">

			<form class="contact" action="confirmdelete.php" method="POST" enctype="multipart/form-data">
	<?php
		echo '<h2>'.$found['first']. ' ' .$found['last'] . '</h2>';
				
		echo '<p>';
		echo $found['dept'].'<br>'.$found['phone'];
		echo '</p>';
	
	?>
				
				<input type="hidden" name="id" value="<?php echo $found['id'];?>">
				
				 <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">DELETE RECORD</button>
				
				<br> <a href="delete.php">Cancel</a>
		</form>
	</div>
	
</body>
</html>