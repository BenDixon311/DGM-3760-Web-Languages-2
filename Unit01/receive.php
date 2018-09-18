<?php
$gender = $_POST[gender];
$name = $_POST[name];
$email = $_POST[emailaddress];
$phone= $_POST[phone];
$comments = $_POST[input];



//BUILD EMAIL
$to = "bendixon311@gmail.com";
$subject = "Form from Unit 01";
$message = "$name has sent you some comments.
INFO:
Gender: $gender

Email: $email

Phone: $phone

Comments: $input

";

//SEND EMAIL

mail($to, $subject, $message, "FROM: ".$email);




?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
		<title>Submission confirmed!</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
	<p>Thank you, <?php echo $name; ?>, for your comments.</p>
	</body>
</html>
