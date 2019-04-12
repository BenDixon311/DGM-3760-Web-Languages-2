<!--navigation-->
	<nav class="navbar navbar-default">
	<div class = "container-fluid">
		<div class="navbar-header">
		
		<a class="navbar-brand" href="index.php">Employee List</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="login.php">Log In</a></li>
			<li><a href="signup.php">Sign Up</a></li>
		</ul>
		
		
		<ul class="nav navbar-nav navbar-right">
		<?php
			
			
			if (isset($_COOKIE['username'])) {
				echo '<li>Hello, '.$_COOKIE['first'].' '.$_COOKIE['last'].'</li><li><a href="logout.php">Sign Out</a></li>';
				
				
			} else {
				echo '<li><a href="login.php">login</a>';
			}
			
			?>
		
		</ul>
		
		
		</div>
	
	</nav>