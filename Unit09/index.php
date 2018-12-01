<?php



require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die("unable to connect to db");

//build query for INNER JOIN
$query = "SELECT * FROM pokemon ORDER BY name ASC";



$result = mysqli_query($dbconnect, $query) or die ('query broken');


function displayType($poketype) {
	
	
	switch($poketype) {
		case 'NOR':
			$b = '<p style = "color: #A8A878;">';
			break;
		case 'FIR':
			$b = '<p style = "color: #F08030;">';
			break;
		case 'FIG':
			$b = '<p style = "color: #C03028;">';
			break;
		case 'WAT':
			$b = '<p style = "color: #6890F0;">';
			break;
		case 'FLY':
			$b = '<p style = "color: #A890F0;">';
			break;
		case 'GRA':
			$b = '<p style = "color: #78C850;">';
			break;
		case 'POI':
			$b = '<p style = "color: #A040A0;">';
			break;
		case 'ELE':
			$b = '<p style = "color: #F8D030;">';
			break;
		case 'GRO':
			$b = '<p style = "color: #E0C068;">';
			break;
		case 'PSY':
			$b = '<p style = "color: #F85888;">';
			break;
		case 'ROC':
			$b = '<p style = "color: #B8A038;">';
			break;
		case 'ICE':
			$b = '<p style = "color: #98D8D8;">';
			break;
		case 'BUG':
			$b = '<p style = "color: #A8B820;">';
			break;
		case 'DRA':
			$b = '<p style = "color: #7038F8">';
			break;
		case 'GHO':
			$b = '<p style = "color: #705898;">';
			break;
		case 'DAR':
			$b = '<p style = "color: #705848;">';
			break;
		case 'STE':
			$b = '<p style = "color: #B8B8D0;">';
			break;
		case 'FAI':
			$b = '<p style = "color: #EE99AC;">';
			break;
		
		return 'you suck!';
		
	}
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pokemon</title>
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
					
					echo '<p class="playername">'.$row['name'];
					
					$type = strtoupper(substr($row['type'], 0, 3));
					$textcolor = displayType($type);
					
					echo $textcolor;
					
					echo $textcolor.$type.'</p></div>';
					
					echo '<p class="positions">'.$row['notes'].'</p>';
					
					
				}
			
			?>
		
		</form>
	</div>
</body>
</html>