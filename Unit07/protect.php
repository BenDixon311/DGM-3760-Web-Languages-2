<?php
//check if user is logged in

if (!isset($_COOKIE['username'])) {
		echo '<p>Please <a href="login.php">Login</a>to access this page.</p>';
	
	exit();
	
}//end if


?>