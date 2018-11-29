<?php
//delete the cookies
setcookie('username','',time()-3600);
setcookie('first','',time()-3600);
setcookie('last','',time()-3600);

header('Location: index.php');

?>

