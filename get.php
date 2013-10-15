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

<style>
select {
	padding: 9px;
	border: solid 1px #E5E5E5;
	outline: 0;
	font: normal 13px/100% Verdana, Tahoma, sans-serif;
	width: 220px;
	background: #FFFFFF url('bg_form.png') left top repeat-x;
	background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #EEEEEE), to(#FFFFFF));
	background: -moz-linear-gradient(top, #FFFFFF, #EEEEEE 1px, #FFFFFF 25px);
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
}
</style>

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

<!-- submenu -->
<?php include '/menus/retrievemenu.php'; ?>





<!-- request form starts -->
<?php 
	switch ($_GET['Rvariable']) {
		case 'default':
			echo "";
			break;
		
		case 'Sselect':
			echo "
			<center>
			<form class='form' action='/select/all_fac.php?var=Sselect' method='POST'>
			</br></br></br></br>

			<table>
			<tr>
			<p class='select'>
			<td><label for='Select'>Select</label></td>
			<td><select name='field'>
				<option value='Stu_id'>Stu_id</option>
				<option value='Name'>Name</option>
				<option value='Course_id'>Course ID</option>
				<option value='Batch_id'>Batch ID</option>
			</select></td>
			</p>
			</tr>
			<tr>	
				<p class='value'>
				<td><label for='value'>Value</label></td>
				<td><input type='text' name='value' /></td>
				</p>
			</tr>				
			</table>

			<input type='hidden' name='table' value='students' />	
				
				<p class='submit'>
					<input type='submit' value='Fetch' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";
			break;

		case 'Fselect':
			echo "
			<center>
			<form class='form' action='/select/all_fac.php?var=Fselect' method='POST'>
			</br></br></br></br>

			<table>
			<tr>
			<p class='select'>
			<td><label for='Select'>Select</label></td>
			<td><select name='field'>
				<option value='Fac_id'>Faculty id</option>
				<option value='Name'>Name</option>
				<option value='Subject'>Subject</option>
				<option value='Position'>Position</option>
			</select></td>
			</p>
			</tr>
			<tr>	
				<p class='value'>
				<td><label for='value'>Value</label></td>
				<td><input type='text' name='value' /></td>
				</p>
			</tr>				
			</table>

			<input type='hidden' name='table' value='Faculty' />	
				
				<p class='submit'>
					<input type='submit' value='Fetch' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";
			break;

		case 'Toppers':
			echo "
			<center>
			<form class='form' action='/select/all_fac.php?var=Brecords' method='POST'>
			</br></br></br></br>

			<table>
			<tr>
			<p class='select'>
			<td align='right'><label for='Select'>Batch ID</label></td>
			<td><select name='field'>
				<option value='mwf'>MWF</option>
				<option value='tts'>TTS</option>
			</select></td>
			</p>
			</tr>				
			</table>

			<input type='hidden' name='table' value='Faculty' />	
				
				<p class='submit'>
					<input type='submit' value='Fetch' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";
			break;


		case 'collaborators':
			echo "";
			break;

		default:
			echo " ";
			break;

	}
?>



</body>
</html>