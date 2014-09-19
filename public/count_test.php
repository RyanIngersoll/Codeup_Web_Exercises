<?php

require 'dbconnect.php';

$countSql = 'SELECT count(*) FROM departments';

$countStmt = $dbc->query($countSql);

$result = $countStmt->fetchAll(PDO::FETCH_ASSOC);
$result[0]['count(*)'];
// gets all the rows

$result = $countStmt->fetch(PDO::FETCH_ASSOC));
$result['count(*)'];
// gets one row from the results

$result = $countStmt->fetchColumn(PDO:: );
// gets a single value from a row

// runs code immediately
// returns number of rows CHANGED
// $dbc->exec()

// // Runs code immediately
// //reutnrs PDOStatement (pointer into DB)
// $dbc->query()

// //Sends code to be  prepared, NOT RAN
// //returns PDOStatement (pointer into the DB)
// $dbc->prepare()