<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$gender = $_POST['gender'];
$name = $_POST['name'];
$email = $_POST['emailaddress'];
$phone= $_POST['phone'];
$color = $_POST['favcolor'];



//BUILD EMAIL
$to = "bendixon311@gmail.com";
$subject = "Form from Unit 01";
$message = "$name has sent you some comments.
INFO:
Gender: $gender

Email: $email

Phone: $phone

Color: $color

";

echo $gender;
echo $email;
echo $phone;
echo $color;

echo $to;
echo $subject;
echo $message;

//SEND EMAIL

	if (mail($to, $subject, $message, "FROM: ".$email)) {
		echo '<h3>Your message has been sent</h3>';
	}
	else {
		echo '<h3>Something went wrong, try again</h3>';
	}






?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
		<title>Submission confirmed!</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
		<div class="container">
			<form id="contact">
	<h3><?php echo $name; ?>, thank you for your comments.</h3>
				</form>
		</div>
	</body>
</html>
