

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search Pokemon</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	
	
	<?php include_once('navbar.php');  ?>
	
	<div class = "container">
	
		<form class = "contact" action="search.php" method="POST">
		<h2>What kinds of pokemon are you looking for?</h2>
			<p>Seperate search values with a comma ( , )</p>
			<input name="pokemonSearch" value = "" type = "text" required>
			
			
		<button name = "submit" type="submit" class="contact-submit" data-submit="...Sending...">Search</button>
		
		
		
		</form>
	
	
	</div>
</body>
</html>



<?php


if (isset($_POST['submit'])) {

	
	$userSearchTerm = strtolower($_POST['pokemonSearch']);
	
	
	
	$searchCleanUp = str_replace(',',' ',$userSearchTerm);
	
	$searchTerm = explode(' ', $searchCleanUp);
	
	
	
	foreach($searchTerm as $x){
		
		if (!empty($x)) {
			$searchArray[] = $x;
		}
		
		echo $searchterm[$x];	
		
		
	}//end foreach
	
	$searchList = array();
	foreach($searchArray as $x) {
		$searchList[] = "notes LIKE '%$x%'";
		
	}//end foreach
	
	$searchClause = implode(' OR ', $searchList);

require_once('variables.php');
	
	if(!empty($searchClause))
	{
		$query = "SELECT * FROM pokemon WHERE $searchClause";
	}
	else {
		$query = "SELECT * FROM pokemon";
	}
	
	
	

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die("unable to connect to db");
	
$result = mysqli_query($dbconnect, $query);
	
	
echo '<div class = "tablecontainer"><form class="contact">';
	echo "<h2>Search results for '$userSearchTerm'</h2>";
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		echo '<h3>'.$row['name'].'</h3>';
		
		
		$myresults = strtolower($row['notes']);
		
		foreach($searchArray as $x) {
			
			$insert = '<span style = "color: red">'.$x.'</span>';
			
			$myresults = str_replace($x, $insert, $myresults);
		}
		
	
		
		
		
		echo $myresults;
	}
}
	
	else {
	echo "<h3>No results for '$userSearchTerm'</h3>";
	
	
}
}
 echo '</form></div>';
			
?>