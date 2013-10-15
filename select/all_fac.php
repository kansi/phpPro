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

switch ($s) {
// Displaying all faculty
    case 'faculty':   
        $sql = "SELECT *
                FROM " . $_GET['var'] ;
//
        $result = mysql_query($sql);

        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Faculty  &nbsp;&nbsp; ID</th>
        <th>Name</th>
        <th>Qualification</th>
        <th>Subject</th>
        <th>Position</th>
        </thead>";

        try
        {
          while($row = mysql_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Fac_id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Qualification'] . "</td>";
            echo "<td>" . $row['Subject'] . "</td>";
            echo "<td>" . $row['Position'] . "</td>";
            echo "</tr>";
            }
          echo "</table></center>";
        }
        catch(Exception $e)
        {
          echo 'Message: ' .$e->getMessage();
        }
        break;

// Displaying all students      
    case 'students':
        $sql = "SELECT *
                FROM " . $_GET['var'] ;
        $result = mysql_query($sql);
//
        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Student  &nbsp;&nbsp; ID</th>
        <th>Name</th>
        <th>Age</th>
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
            echo "<td>" . $row['Age'] . "</td>";
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
        break;

//displaying records
    case 'records':
        $sql = "SELECT S.Stu_id, S.Name, R.Marks, R.Rank 
                FROM students AS S, records AS R 
                WHERE S.Stu_id=R.Stu_id ORDER BY R.rank" ;

//
        $result = mysql_query($sql);
        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Student ID</th>
        <th>Name</th>
        <th>Marks</th>
        <th>Rank</th>
        </thead>";

        try
        {
          while($row = mysql_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Stu_id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Marks'] . "</td>";
            echo "<td>" . $row['Rank'] . "</td>";
            echo "</tr>";
            }
          echo "</table></center>";
        }
        catch(Exception $e)
        {
          echo 'Message: ' .$e->getMessage();
        }
        break;

//batch wise toppers
    case 'Brecords':
        $sql = "SELECT S.Stu_id, S.Name, R.Marks, R.Rank 
                FROM students AS S, records AS R 
                WHERE  S.Batch_id = '$_POST[field] ' AND S.Stu_id=R.Stu_id ORDER BY R.rank";
//        
        $result = mysql_query($sql);
        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Student ID</th>
        <th>Name</th>
        <th>Marks</th>
        <th>Rank</th>
        </thead>";

        try
        {
          while($row = mysql_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Stu_id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Marks'] . "</td>";
            echo "<td>" . $row['Rank'] . "</td>";
            echo "</tr>";
            }
          echo "</table></center>";
        }
        catch(Exception $e)
        {
          echo 'Message: ' .$e->getMessage();
        }            
        break;

//Attendance
    case 'Attendance':
        $sql = "SELECT S.Stu_id, S.Name, A.No_of_Classes_Missed, A.Total_No_of_Classes 
                FROM students AS S, attendance AS A 
                WHERE S.Stu_id=A.Stu_id ORDER BY A.No_of_Classes_Missed";
//        
        $result = mysql_query($sql);
        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Student ID</th>
        <th>Name</th>
        <th>Missed</th>
        <th>Total</th>
        </thead>";  

        try
        {
          while($row = mysql_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Stu_id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['No_of_Classes_Missed'] . "</td>";
            echo "<td>" . $row['Total_No_of_Classes'] . "</td>";
            echo "</tr>";
            }
          echo "</table></center>";
        }
        catch(Exception $e)
        {
          echo 'Message: ' .$e->getMessage();
        }            
        break;

//Displaying seleted students
    case 'Sselect':
        $sql = "SELECT * 
                FROM students 
                WHERE " . $_POST['field'] . "= '$_POST[value]' ";
//
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
            echo "<td>" . $row['Age'] . "</td>";
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
        break; 

//Displaying selected faculty
    case 'Fselect':   
        $sql = "SELECT * FROM ". $_POST['table'] . " WHERE " . $_POST['field'] . "= '$_POST[value]' ";
        $result = mysql_query($sql);
//
        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Faculty  &nbsp;&nbsp; ID</th>
        <th>Name</th>
        <th>Qualification</th>
        <th>Subject</th>
        <th>Position</th>
        </thead>";

        try
        {
          while($row = mysql_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Fac_id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Qualification'] . "</td>";
            echo "<td>" . $row['Subject'] . "</td>";
            echo "<td>" . $row['Position'] . "</td>";
            echo "</tr>";
            }
          echo "</table></center>";
        }
        catch(Exception $e) 
        {
          echo 'Message: ' .$e->getMessage();
        }
        break;

// displaying facilities availed by students *********************
    case 'collaborators':
        $sql = "SELECT S.Stu_id, S.Name, C.Publications, C.Courier, C.Infrastructure, C.Transport 
                FROM students AS S, collaborators AS C 
                WHERE S.Collab_id = C.Collab_id ";
//
        $result = mysql_query($sql);

        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Student ID</th>
        <th>Name</th>
        <th>Publications</th>
        <th>Courier</th>
        <th>Infrastructure</th>
        <th>Transport</th>
        </thead>";
        
        try
        {
          while($row = mysql_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Stu_id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Publications'] . "</td>";
            echo "<td>" . $row['Courier'] . "</td>";
            echo "<td>" . $row['Infrastructure'] . "</td>";
            echo "<td>" . $row['Transport'] . "</td>";
            echo "</tr>";

            }
          echo "</table></center>";
        }
        catch(Exception $e) 
        {
          echo 'Message: ' .$e->getMessage();
        }
        break;

    case 'fees':
        $sql = "SELECT S.Stu_id, S.Name, F.Amount_Paid, F.Total_Amount
                FROM students AS S, fees AS F 
                WHERE S.Stu_id = F.Stu_id 
                ORDER BY F.Amount_Paid";
//
        $result = mysql_query($sql);

        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Student ID</th>
        <th>Name</th>
        <th>Paid</th>
        <th>Total</th>
        </thead>";
        
        try
        {
          while($row = mysql_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Stu_id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Amount_Paid'] . "</td>";
            echo "<td>" . $row['Total_Amount'] . "</td>";
            echo "</tr>";

            }
          echo "</table></center>";
        }
        catch(Exception $e) 
        {
          echo 'Message: ' .$e->getMessage();
        }
        break;

    case 'correspondence':
        $sql = "SELECT C.Stu_id, C.Stu_name, C.Address, F.No_of_Booklets_Sent, F.Total_Booklets
                FROM correspondence AS C, correspondence_dets AS F  
                WHERE C.Address = F.Address ";
//
        $result = mysql_query($sql);

        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Student ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Booklets Sent</th>
        <th>Total Booklets</th>
        </thead>";
        
        try
        {
          while($row = mysql_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Stu_id'] . "</td>";
            echo "<td>" . $row['Stu_name'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['No_of_Booklets_Sent'] . "</td>";
            echo "<td>" . $row['Total_Booklets'] . "</td>";
            echo "</tr>";

            }
          echo "</table></center>";
        }
        catch(Exception $e) 
        {
          echo 'Message: ' .$e->getMessage();
        }
        break;

    case 'results':
        $sql = "SELECT Prev_id, Name, Year, Rank
                FROM result
                ORDER BY Year, Rank ";
//
        $result = mysql_query($sql);

        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Student ID</th>
        <th>Name</th>
        <th>Year</th>
        <th>Rank</th>
        </thead>";
        
        try
        {
          while($row = mysql_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Prev_id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Year'] . "</td>";
            echo "<td>" . $row['Rank'] . "</td>";
            echo "</tr>";

            }
          echo "</table></center>";
        }
        catch(Exception $e) 
        {
          echo 'Message: ' .$e->getMessage();
        }
        break;

    case 'series':
        $sql = "SELECT  T.Candidate_id, T.Series_id, D.No_of_Tests_Conducted, D.Total_Tests
                FROM test_series AS T, tests_dets AS D
                WHERE T.Candidate_id = D.Candidate_id ";
//
        $result = mysql_query($sql);

        echo "</br></br></br></br><center><table id=\"table-2\" >
        <thead>
        <th>Student ID</th>
        <th>Series ID</th>
        <th>Tests Taken</th>
        <th>Total</th>
        </thead>";
        
        try
        {
          while($row = mysql_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Candidate_id'] . "</td>";
            echo "<td>" . $row['Series_id'] . "</td>";
            echo "<td>" . $row['No_of_Tests_Conducted'] . "</td>";
            echo "<td>" . $row['Total_Tests'] . "</td>";
            echo "</tr>";

            }
          echo "</table></center>";
        }
        catch(Exception $e) 
        {
          echo 'Message: ' .$e->getMessage();
        }
        break;

    default:
        echo "";
        break;
}

?>

</body>
</head>