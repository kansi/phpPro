<?php

// Inialize session
session_start();

// Include database connection settings
include('config.inc');

switch ($_GET['var']) {

	case 'Admin':
		$sql = "INSERT INTO users (id, username, password)
				VALUES
				( 1, '$_POST[Username]', '$_POST[Password]')
				";
		break;

	case 'Finsert':
		$sql = "INSERT INTO Faculty (Fac_id,  Sex, Name, Age, Qualification, Subject, Paygrade, Position)	
				VALUES
				('$_POST[Fac_id]', '$_POST[Sex]', '$_POST[Name]', '$_POST[Age]', '$_POST[Qualification]', '$_POST[Subject]', '$_POST[Paygrade]', '$_POST[Position]')
				";
		break;
	
	case 'Sinsert':
		$sql = "INSERT INTO Students (Stu_id, Age, Sex, Name, Course_id, Batch_id, P_id, S_id, Collab_id)
				VALUES
				('$_POST[Stu_id]', '$_POST[Age]', '$_POST[Sex]', '$_POST[Name]', '$_POST[Course_Id]', '$_POST[Batch_id]', '$_POST[P_id]', '$_POST[S_id]', '$_POST[Collab_id]')
				";
		break;

	case 'Pinsert':
		$sql = "INSERT INTO Program (Prog_id, No_of_Students, Cost)
				VALUES
				('$_POST[Prog_id]', '$_POST[No_of_Students]', '$_POST[Cost]')
				";
		break;

	case 'Tseries':
		$sql = "INSERT INTO test_series (Series_id, Candidate_id)
				VALUES
				$_POST[Value]
				";
		break;

	case 'Tcandidate':
		$sql = "INSERT INTO tests_dets (Candidate_id, Candidate_address, No_of_Tests_Conducted, Total_Tests)
				VALUES
				$_POST[Value]
				";
		break;

	case 'Sdelete':
		$sql = "DELETE FROM Students where Name = '$_POST[Name]' AND Stu_id = '$_POST[Stu_id]' ";
		break;

	case 'Fdelete':
		$sql = "DELETE FROM Faculty where Name = '$_POST[Name]' AND Fac_id = '$_POST[Fac_id]' ";
		break;

	case 'Pdelete':
		$sql = "DELETE FROM Program where Prog_id = '$_POST[Prog_id]' ";
		break;




	case 'Supdate':
		$sql = "UPDATE Students SET " . $_POST['field'] . "= '$_POST[value]' WHERE Stu_id = '$_POST[Stu_id]' ";
		break;

	case 'Fupdate':
		$sql = "UPDATE Faculty SET " . $_POST['field'] . "= '$_POST[value]' WHERE Fac_id = '$_POST[Fac_id]' ";
		break;

	case 'Pupdate':
		$sql = "UPDATE Program SET " . $_POST['field'] . "= '$_POST[value]' WHERE Prog_id = '$_POST[Prog_id]'  ";
		break;		

	default:
		echo "nothing done";
		break;

}
//echo $sql;

if (mysql_query($sql))
{
	echo "<center><h3>Successfull</h3></center>";
	header('refresh: 2; add.php?Ivariable=default');
}
else
{
	echo "<h3>UNsuccessfull</h3>";
	header('refresh: 3; add.php?Ivariable=default');
}

?>