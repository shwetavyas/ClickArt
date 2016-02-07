<?php
	$username = 'nikunj';
	$password = 'password';

	if(!isset($_server['PHP_AUTH_USER']) || !isset($_server['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] !='$username' || $_SERVER['PHP_AUTH_PW'] !='$password'){
		header('HTTP/1.1 401 Unauthorized');
		header('Wrong Credientials');
		exit('<h2>Sorry! Wrong Credientials!</h2>');
	}
	else{
		header('Refresh: 5; url=sampleEmail.php');
		echo "In 5 seconds you will receive email from us.";
	}
?>