<!-- cookies ARE NOT SETTING HERE -->	

<?php

	
		require_once('variables.php');

	
	$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die("unable to connect to db");
	
	if (isset($_POST['submit'])) {
		
		$first = mysqli_real_escape_string($dbconnect,trim($_POST['first']));
		
		$last = mysqli_real_escape_string($dbconnect,trim($_POST['last']));
		
		$username = mysqli_real_escape_string($dbconnect,trim($_POST['username']));
		
		$password = mysqli_real_escape_string($dbconnect,trim($_POST['password']));
		
		$confirm = mysqli_real_escape_string($dbconnect,trim($_POST['confirm']));
		
		
		//double check if values are present
		
		if(!empty($username) && !empty($password) && !empty($confirm) && ($password == $confirm)) {
			
			$query = "SELECT * FROM users WHERE username = '$username'";
			
			
			$alreadyexists = mysqli_query($dbconnect, $query) or die ('query failed, man');
			
			//check if username already exists
			if (mysqli_num_rows($alreadyexists) == 0) {
				//add new user
				
				$query = "INSERT INTO users (first, last, username, password, date) VALUE ('$first', '$last', '$username', SHA('$password'), NOW())";
				
				mysqli_query($dbconnect, $query) or die ('insert query failed');
				
				$feedback = '<div class="container"><form class="contact"><p>User successfully registered</p>
				<br>
				<p>Return to the <a href = "index.php">main page</a></p></form></div>';
				
				
				setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));
				setcookie('first', $row['first'], time() + (60 * 60 * 24 * 30));
				setcookie('last', $row['last'], time() + (60 * 60 * 24 * 30));
				
				mysqli_close($dbconnect);
				
			
				
				
				
				
				
			}
			else { //not unique
				$feedback = '<div class="container"><form class="contact"><p class="error">Username already exists! Please try again</p></form></div>';
			}//end of check username
		}
		else {
			$feedback = '<div class="container"><form class="contact"><p class="error">Passwords do not match</p></form></div>';
		}
		
	}
		
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
	
	
		echo $feedback;
		
	?>
	
	<div class="container">
	
	
	
	<form class="contact" action="signup.php" method="POST" enctype="multipart/form-data">
	
	
	
	
	

		
		<h2>New Account Registration</h2>
   

    <fieldset>
		<legend>User info</legend>
		First Name: <input type = "text" name = "first" required value = "<?php if (!empty($first)) echo $first; ?>"><br>
		Last Name: <input type = "text" name = "last"  required value = "<?php if (!empty($last)) echo $last; ?>"><br>
		Username: <input type="text" name = "username" required value = "<?php if (!empty($username)) echo $username; ?>"><br>
		Password: <input type = "password" name = "password" required><br>
		Confirm Password: <input type = "password" name = "confirm" required> <br>
		
		</fieldset>
		
	
		

    <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">Sign Up</button>
		
		
		
	</form>
	
	</div>
	
	
	

</body>
	
	


    




</html>