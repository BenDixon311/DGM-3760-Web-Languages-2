<?php
require_once('variables.php');

$feedback = '<div class="container"><form class="contact"><p><a href = "signup.php">Sign up for an account</a></p></form></div>';

	
if (isset($_POST['submit'])) {
	
	$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die("unable to connect to db");
	
	$username = mysqli_real_escape_string($dbconnect, trim($_POST['username']));
	
	$password = mysqli_real_escape_string($dbconnect, trim($_POST['password']));
	
	$query = "SELECT * FROM users WHERE username = '$username' AND password = SHA('$password')";
	$data = mysqli_query($dbconnect, $query) or die ('query failed');
	
	
	//if password matches
	if (mysqli_num_rows($data) == 1) {
		$row = mysqli_fetch_array($data);
		
		//save cookies
		echo '<p>setting cookies yo</p>';
		setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));
		setcookie('first', $row['first'], time() + (60 * 60 * 24 * 30));
		setcookie('last', $row['last'], time() + (60 * 60 * 24 * 30));
		
		header('Location: index.php');
		
		
		
	} else { //password not found
		$feedback = '<div class="container"><form class="contact"><p>Could not find an account for '.$_POST['username'].'. Try a new password or<a href="signup.php"> create a new account</a></p></form></div>';
	}
	
}
	
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<body>
	
	<?php
		include_once('navbar.php');
	
	?>
		<?php echo $feedback; ?>
<div class="container">
	
	<form class = "contact" method="post" action="login.php">
		
	
		<fieldset>
		<legend>User info</legend>
		Username: <input type = "text" name = "username" required value = "<?php if (!empty($username)) echo $username; ?>"><br>
		Password: <input type = "password" name = "password"  required><br>
		</fieldset>
		
		 <button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">Log In</button>
		
	
	</form>
	
	</div>

</body>
</html>