<?php

// Inialize session
session_start();

// Include database connection settings
include('config.inc');

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM users WHERE (username = '" . mysql_real_escape_string($_POST['username']) . "') and (password = '" . mysql_real_escape_string($_POST['password']) . "')");

// Check username and password match
if (mysql_num_rows($login) == 1) {
// Set username session variable
$_SESSION['username'] = $_POST['username'];

$row = mysql_fetch_array($login);	
	
	if ($row['id'] == 1) {
		$_SESSION['admin'] = 1;	
	}
	else{
		$_SESSION['admin'] = 0;	
	}	

// Jump to secured page
header('Location: ../index.php');
}
else {
// Jump to login page
header('Location: index.php');
}

?>