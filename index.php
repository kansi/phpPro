<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['username'])) {
header('Location: /login/');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
 
<head profile="http://gmpg.org/xfn/11"> 
	<title></title> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<link rel="stylesheet" href="demo.css" type="text/css" media="all" />

	<link href="/menu_assets/styles.css" rel="stylesheet" type="text/css">
</head> 


<body>

<!--navbar -->
<ul class="semiopaquemenu">
<?php 
	if ($_SESSION['admin'] == 1) {
		include '/menus/admin_menu.php';
	 }
	 else{
	 	include '/menus/menu.php';	
	 } 
?>
</ul>
<div class="bottombar"></div>

<!--<div class="bottombar"></div> -->
<center>
<p style="font-family:arial;color:#C9C9C9;font-size:20px;">Wlecome TO FIITJEE</p>

</center>
</body>
</html>