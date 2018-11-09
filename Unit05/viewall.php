<?php
$dbconnect = mysqli_connect('localhost','bendix7_dgm3760','epitaph311','bendix7_dgm3760') or die('unable to connect to database');

$query = "SELECT * FROM Employees ORDER BY last ASC";

$result = mysqli_query($dbconnect, $query) or die ('failed, you suck');




?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Employees</title>
		<link rel="stylesheet" href="style.css">
</head>

<body>
	
	<?php
		while ($row = mysqli_fetch_array($result)) {
			
			echo '<p>';
			echo $row['last'] . ', '. $row['first']. ' - '.$row['dept'];
			
			
			
			echo '</p>';
		}
	
	
	?>
	
</body>
</html>