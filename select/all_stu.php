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
	<link rel="stylesheet" href="../demo.css" type="text/css" media="all" />

	<link href="../menu_assets/styles.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="table.css" type="text/css" media="all" />
</head> 

<body>

<!--navbar -->
<ul class="semiopaquemenu">
<?php 

  if ($_SESSION['admin'] == 1) {
    include '../menus/admin_menu.php';
   }
   else{
    include '../menus/menu.php';  
   } 
?>
</ul>
<!--<div class="bottombar"></div> -->
<?php include '../menus/retrievemenu.php'; ?>





<?php

// Inialize session
//session_start();

// Include database connection settings
include('config.inc');

$s = $_GET['var'];
$sql = "SELECT *
		FROM " . $_GET['var'] ;

$result = mysql_query($sql);

echo "</br></br></br></br><center><table id=\"table-2\" >
<thead>
<th>Student  &nbsp;&nbsp; ID</th>
<th>Name</th>
<th>DOB</th>
<th>Sex</th>
<th>Course</th>
<th>Batch</th>
</thead>";

try
{
  while($row = mysql_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Stu_id'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['DOB'] . "</td>";
    echo "<td>" . $row['Sex'] . "</td>";
    echo "<td>" . $row['Course_id'] . "</td>";
    echo "<td>" . $row['Batch_id'] . "</td>";
    echo "</tr>";
    }
  echo "</table></center>";
}
catch(Exception $e)
{
  echo 'Message: ' .$e->getMessage();
}

?>

</body>
</head>