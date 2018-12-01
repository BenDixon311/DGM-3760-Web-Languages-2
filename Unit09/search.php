<?php





require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die("unable to connect to db");
			
$query = "SELECT * FROM west_teams ORDER BY team_id";
	
$result = mysqli_query($dbconnect, $query) or die ('unable to query teams');
			
			
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search by Team</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	
	
	<?php include_once('navbar.php');  ?>
	
	<div class = "tablecontainer">
	
		<form class = "contact">
		<h1>Search By Top 5 Teams</h1>
			<ul class="listclass">
			
				<?php
					while($row = mysqli_fetch_array($result)) {
						echo '<li><a href="index.php?team_id='.$row['team_id'].'">'.$row['team_name'].'</a></li>';
					}
				
				?>
			
			
			</ul>

		
		
		
		</form>
	
	
	</div>
</body>
</html>