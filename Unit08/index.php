<?php


$searchid = '';
$team = $_GET[team_id];


if (isset($_GET[team_id])){
	
	$searchid = "WHERE west_players.team_id=$team";

}

require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die("unable to connect to db");

//build query for INNER JOIN
$query = "SELECT * FROM west_players INNER JOIN west_teams ON (west_players.team_id = west_teams.team_id) $searchid ORDER BY last";



$result = mysqli_query($dbconnect, $query) or die ('inner join query did not work');

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>NBA Players</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	
	<?php include_once('navbar.php');  ?>
	
	<div class="tablecontainer">
		<form class="contact">
		
			<?php
				while ($row = mysqli_fetch_array($result)) {
					//TERNARY OPERATOR
					echo '<div class = "playercard">';
					
					echo '<p class="playername">'.$row['first'].' '.$row['last'];
					echo ($row['team_id'] == 2 ? ' - 2018 NBA Champion</p> ' : '</p>');
					
					echo $row['team_name'].'</div>';
					
					echo '<div class = "playerdetails"><p>'.$row['first'].' plays the following positions: </p>';
					
					$playerid = $row['id'];
					
					$query2 = "SELECT * FROM west_skills INNER JOIN west_positions ON (west_skills.position_id = west_positions.position_id) WHERE id=$playerid";
					
					$resultPos = mysqli_query($dbconnect, $query2) or die ('unable to query positions');
					
					while ($posrow = mysqli_fetch_array($resultPos)) {
						echo '<p class="positions">'.$posrow['position_name'].'</p>';
					}
					
					echo '</div>';
					
					
					
				}
			
			?>
		
		</form>
	</div>
</body>
</html>