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
//		include '/menus/insertmenu.php';
	 }
	 else{
	 	header('Location: /index.php');
//	 	include '/menus/menu.php';	
	 } 
?>
</ul>
<!--navbar end-->
<!-- submenu -->
<?php include '/menus/insertmenu.php'; ?>



<!-- request form starts -->
<?php 

	switch ($_GET['Ivariable']) {
		case 'default':
			echo " ";
			break;

		case 'Admin':
			echo "
			<center>
			<form class='form' action='insert.php?var=Admin' method='POST'>
			</br></br></br></br>

			<table>
			<tr>	
				<p class='Username'>
				<td align='right'><label for='Username'>Username</label></td>
				<td><input type='text' name='Username' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Password'>
				<td align='right'><label for='Password'>Password</label></td>
				<td><input type='password' name='Password' /></td>
				</p>
			</tr>	
			</table>

				<p class='submit'>
					<input type='submit' value='Insert' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";			
			break;

		case 'Sinsert':
			echo "
			<center>
			<form class='form' action='insert.php?var=Sinsert' method='POST'>
			</br></br></br></br>

			<table>
			<tr>	
				<p class='Name'>
				<td align='right'><label for='Name'>Name</label></td>
				<td><input type='text' name='Name' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Stu_id'>
				<td align='right'><label for='Stu_id'>Student ID</label></td>
				<td><input type='text' name='Stu_id' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Age'>
				<td align='right'><label for='Age'>Age</label></td>
				<td><input type='text' name='Age' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Sex'>
				<td align='right'><label for='Sex'>Sex</label></td>
				<td><input type='text' name='Sex' /></td>
				</p>
			</tr>	
			<tr>
				<p class='Course_Id'>
				<td align='right'><label for='Course_Id'>Course Id</label></td>
				<td><input type='text' name='Course_Id'  /></td>
				</p>
			</tr>
			<tr>
				<p class='Batch_id'>
				<td align='right'><label for='Batch_id'>Batch Id</label></td>
				<td><input type='text' name='Batch_id' /></td>
				</p>
			</tr>
			<tr>	
				<p class='P_id'>
				<td align='right'><label for='P_id'>Program ID</label></td>
				<td><input type='text' name='P_id' /></td>
				</p>
			</tr>
			<tr>	
				<p class='S_id'>
				<td align='right'><label for='S_id'>S ID</label></td>
				<td><input type='text' name='S_id' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Collab_id'>
				<td align='right'><label for='Collab_id'>Collaborator ID</label></td>
				<td><input type='text' name='Collab_id' /></td>
				</p>
			</tr>
			</table>

				<p class='submit'>
					<input type='submit' value='Insert' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";

			break;

		case 'Finsert':
			echo "
			<center>
			<form class='form' action='insert.php?var=Finsert' method='POST'>
			</br></br></br></br>

			<table>
			<tr>	
				<p class='Name'>
				<td align='right'><label for='Name'>Name</label></td>
				<td><input type='text' name='Name' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Fac_id'>
				<td align='right'><label for='Fac_id'>Faculty ID</label></td>
				<td><input type='text' name='Fac_id' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Age'>
				<td align='right'><label for='Age'>Age</label></td>
				<td><input type='text' name='Age' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Sex'>
				<td align='right'><label for='Sex'>Sex</label></td>
				<td><input type='text' name='Sex' /></td>
				</p>
			</tr>	
			<tr>
				<p class='Subject'>
				<td align='right'><label for='Subject'>Subject</label></td>
				<td><input type='text' name='Subject'  /></td>
				</p>
			</tr>
			<tr>
				<p class='Qualification'>
				<td align='right'><label for='Qualification'>Qualification</label></td>
				<td><input type='text' name='Qualification' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Position'>
				<td align='right'><label for='Position'>Position</label></td>
				<td><input type='text' name='Position' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Paygrade'>
				<td align='right'><label for='Paygrade'>Paygrade</label></td>
				<td><input type='text' name='Paygrade' /></td>
				</p>
			</tr>
			</table>

				<p class='submit'>
					<input type='submit' value='Insert' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";

			break;

		case 'Pinsert':
			echo "
			<center>
			<form class='form' action='insert.php?var=Pinsert' method='POST'>
			</br></br></br></br>

			<table>
			<tr>	
				<p class='Prog_id'>
				<td align='right'><label for='Prog_id'>Program ID</label></td>
				<td><input type='text' name='Prog_id' /></td>
				</p>
			</tr>
			<tr>	
				<p class='No_of_Students'>
				<td align='right'><label for='No_of_Students'>No. of Students</label></td>
				<td><input type='text' name='No_of_Students' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Cost'>
				<td align='right'><label for='Cost'>Cost</label></td>
				<td><input type='text' name='Cost' /></td>
				</p>
			</tr>	
			</table>

				<p class='submit'>
					<input type='submit' value='Insert' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";			
			break;

		case 'Tseries':
			echo "
			<center>
			<form class='form' action='insert.php?var=Tseries' method='POST'>
			</br></br></br></br>

			<table>
			<tr>
				<td></td>
				<td style='font-family:arial;color:#C9C9C9;font-size:12px;' >(Series ID, Candidate ID)</td>
			</tr>
			<tr>	
				<p class='Value'>
				<td align='right'><label for='Value'>Enter Tuple</label></td>
				<td><input type='text' name='Value' /></td>
				</p>
			</tr>	
			</table>

				<p class='submit'>
					<input type='submit' value='Insert' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";			
			break;

		case 'Tcandidate':
			echo "
			<center>
			<form class='form' action='insert.php?var=Tcandidate' method='POST'>
			</br></br></br></br>

			<table>
			<tr>
				<td></td>
				<td style='font-family:arial;color:#C9C9C9;font-size:10px;' >(Candidate ID, Address, Tests conducted, Total)</td>
			</tr>
			<tr>	
				<p class='Value'>
				<td align='right'><label for='Value'>Enter Tuple</label></td>
				<td><input type='text' name='Value' /></td>
				</p>
			</tr>	
			</table>

				<p class='submit'>
					<input type='submit' value='Insert' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";			
			break;

//Delete starts from here****************
		case 'Sdelete':
			echo "
			<center>
			<form class='form' action='insert.php?var=Sdelete' method='POST'>
			</br></br></br></br>
			
			<table>
			<tr>	
				<p class='Name'>
				<td align='right'><label for='Name'>Name</label></td>
				<td><input type='text' name='Name' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Stu_id'>
				<td align='right'><label for='Stu_id'>Student ID</label></td>
				<td><input type='text' name='Stu_id' /></td>
				</p>
			</tr> 
			</table>
				<p class='submit'>
					<input type='submit' value='Delete' />
				</p>
			</form>
			</center>";

			break;

		case 'Fdelete':
			echo "
			<center>
			<form class='form' action='insert.php?var=Fdelete' method='POST'>
			</br></br></br></br>
			
			<table>
			<tr>	
				<p class='Name'>
				<td align='right'><label for='Name'>Name</label></td>
				<td><input type='text' name='Name' /></td>
				</p>
			</tr>
			<tr>	
				<p class='Fac_id'>
				<td align='right'><label for='Fac_id'>Faculty ID</label></td>
				<td><input type='text' name='Fac_id' /></td>
				</p>
			</tr> 
			</table>
				<p class='submit'>
					<input type='submit' value='Delete' />
				</p>
			</form>
			</center>";

			break;

		case 'Pdelete':

			echo "
			<center>
			<form class='form' action='insert.php?var=Pdelete' method='POST'>
			</br></br></br></br>
			
			<table>
			<tr>	
				<p class='Prog_id'>
				<td align='right'><label for='Prog_id'>Program ID</label></td>
				<td><input type='text' name='Prog_id' /></td>
				</p>
			</tr> 
			</table>
				<p class='submit'>
					<input type='submit' value='Delete' />
				</p>
			</form>
			</center>";

			break;


//updating starts here **********************************

		case 'Supdate':
			echo "
			<center>
			<form class='form' action='insert.php?var=Supdate' method='POST'>
			</br></br></br></br>	

			<table>
			<tr>	
				<p class='Stu_id'>
				<td align='right'><label for='Stu_id'>Student ID</label></td>
				<td><input type='text' name='Stu_id' /></td>
				</p>
			</tr>
			<tr>
			<p class='select'>
			<td align='right'><label for='Select'>Select</label></td>
			<td><select name='field'>
				<option value='Name'>Name</option>
				<option value='Course_id'>Course ID</option>
				<option value='Batch_id'>Batch ID</option>
				<option value='Collab_id'>Collab ID</option>	
			</select></td>
			</p>
			</tr>
			<tr>	
				<p class='value'>
				<td align='right'><label for='value'>Value</label></td>
				<td><input type='text' name='value' /></td>
				</p>
			</tr>				
			</table>
				
				<p class='submit'>
					<input type='submit' value='Update' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";
			break;

		case 'Fupdate':
			echo "
			<center>
			<form class='form' action='insert.php?var=Fupdate' method='POST'>
			</br></br></br></br>	

			<table>
			<tr>	
				<p class='Fac_id'>
				<td align='right'><label for='Fac_id'>Faculty ID</label></td>
				<td><input type='text' name='Fac_id' /></td>
				</p>
			</tr>
			<tr>
			<p class='select'>
			<td align='right'><label for='Select'>Select</label></td>
			<td><select name='field'>
				<option value='Subject'>Subject</option>
				<option value='Paygrade'>Paygrade</option>
				<option value='Position'>Positon</option>	
			</select></td>
			</p>
			</tr>
			<tr>	
				<p class='value'>
				<td align='right'><label for='value'>Value</label></td>
				<td><input type='text' name='value' /></td>
				</p>
			</tr>				
			</table>	
				
				<p class='submit'>
					<input type='submit' value='Update' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";
			break;

		case 'Pupdate':
			echo "
			<center>
			<form class='form' action='insert.php?var=Pupdate' method='POST'>
			</br></br></br></br>	

			<table>
			<tr>	
				<p class='Prog_id'>
				<td align='right'><label for='Prog_id'>Program ID</label></td>
				<td><input type='text' name='Prog_id' /></td>
				</p>
			</tr>
			<tr>
			<p class='select'>
			<td align='right'><label for='Select'>Select</label></td>
			<td><select name='field'>
				<option value='No_of_Students'>No. of Students</option>
				<option value='Cost'>Cost</option>
			</select></td>
			</p>
			</tr>
			<tr>	
				<p class='value'>
				<td align='right'><label for='value'>Value</label></td>
				<td><input type='text' name='value' /></td>
				</p>
			</tr>				
			</table>

				<p class='submit'>
					<input type='submit' value='Update' />
				</p>
			</form>
			</center>	
			<!-- request form ends --> ";
			break;

		default:
			echo " ";
			break;

	}
?>

</body>
</html>