<?php

// Inialize session
session_start();

// Include database connection settings
include('config.inc');

$sql = "SELECT * FROM ". $_POST['table'] . " WHERE " . $_POST['field'] . "= '$_POST[value]' ";

echo $sql;
/*$sql = "INSERT INTO Students (Stu_id, DOB, Sex, Name, Course_id, Batch_id, P_id, S_id, Collab_id)
		VALUES
		('$_POST[Stu_id]', '$_POST[DOB]', '$_POST[Sex]', '$_POST[Name]', '$_POST[Course_Id]', '$_POST[Batch_id]', '$_POST[P_id]', '$_POST[S_id]', '$_POST[Collab_id]')
		";
	
if (mysql_query($sql))
{
	echo "<h3>Successfull Insert</h3>";
	header('refresh: 1; add.php?Ivariable=default');
}
else
{
	echo "<h3>UNsuccessfull Insert</h3>";
	header('refresh: 1; add.php?Ivariable=default');
}
*/
?>	