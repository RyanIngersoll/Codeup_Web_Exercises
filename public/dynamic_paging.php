<?php
// database connection info
// $conn = mysql_connect('localhost','dbusername','dbpass') or trigger_error("SQL", E_USER_ERROR);
// $dbc = mysql_select_db('dbname',$conn) or trigger_error("SQL", E_USER_ERROR);
require 'dbconnection.php';
//returns $dbc
// $dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'codeup', 'password');

// // Tell PDO to throw exceptions on error
// $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// find out how many rows are in the table 
$sql = "SELECT COUNT(*) FROM parks";
$result = mysql_query($sql, $dbc) or trigger_error("SQL", E_USER_ERROR);
$r = mysql_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 3;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if
