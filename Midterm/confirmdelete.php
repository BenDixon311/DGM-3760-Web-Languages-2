<?php

$employee_id = $_GET[id];
$filepath = 'employees/';

require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die('unable to connect');
if(isset($_POST['submit'])) {
	
	$query = "DELETE FROM employee_db WHERE id=$_POST[id]";
	
	
	
	$result = mysqli_query($dbconnect, $query) or die ('didnt connect to DB after submit');
	
	@unlink($_POST['photo']);
	
	//redirect after deltion
	header("Location: http://dgm3760.bendixondev.com/Midterm/HRviewall.php");
	
	exit; //make sure next query doesn't try to execute
}

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

			<form class="contact" action="confirmdelete.php" method="POST" enctype="multipart/form-data">
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
				<input type="hidden" name="photo" value="employees/<?php echo $found['photo'];?>">
				<input type="hidden" name="id" value="<?php echo $found['id'];?>">
				
				 <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">DELETE RECORD</button>
				
				<br> <a href="HRviewall.php">Cancel</a>
		</form>
	</div>
	
</body>
</html>