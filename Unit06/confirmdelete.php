<?php

require_once('authorize.php');

$id = $_GET['id'];

require_once('variables.php');

$dbconnect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('unable to connect to DB');

$query = "DELETE FROM comments WHERE id=$id";

$result = mysqli_query($dbconnect, $query) or die ('unable to fetch result');

header('Location: approve.php')

?>