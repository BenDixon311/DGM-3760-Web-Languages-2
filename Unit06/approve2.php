<?php

require_once('authorize.php');

$id = $_GET['id'];

require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('unable to connect to DB');

$query = "UPDATE comments SET approved = 1 WHERE id=$id";

$result = mysqli_query($dbconnect, $query) or die ('unable to fetch result');

header('Location: approve.php')

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>