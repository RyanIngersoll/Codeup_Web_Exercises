<?php
// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'codeup', 'password');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// has setattribute and fetchall fetchcolumn function inside

//echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

// Create the query and assign to var
// $query = 'CREATE TABLE users (
//     id INT UNSIGNED NOT NULL AUTO_INCREMENT,
//     email VARCHAR(240) NOT NULL,
//     name VARCHAR(50) NOT NULL,
//     PRIMARY KEY (id),

// )';

// $dbc->exec($query);

//echo 'this is so cool';

// Create INSERT query
// $query = "INSERT INTO users (email, name) VALUES ('ben@codeup.com', 'Ben Batschelet')";

// // Execute Query
// $numRows = $dbc->exec($query);
// echo "Inserted $numRows row." . PHP_EOL;

// $users = [
//     ['email' => 'jason@codeup.com',   'name' => 'Jason Straughan'],
//     ['email' => 'chris@codeup.com',   'name' => 'Chris Turner'],
//     ['email' => 'michael@codeup.com', 'name' => 'Michael Girdley']
// ];

// foreach ($users as $user) {
//     $query = "INSERT INTO users (email, name) VALUES ('{$user['email']}', '{$user['name']}')";

//     $dbc->exec($query);

//     echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
// }

// function getUsers() {
//     // Bring the $dbc variable into scope somehow

//     $stmt = $dbc->query('SELECT * FROM users');

//     $rows = array();
//     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         $rows[] = $row;
//     }

//     return $rows;

// }

// var_dump(getUsers());


// $stmt = $dbc->query('SELECT * FROM users');

// echo "Columns: " . $stmt->columnCount() . PHP_EOL;
// echo "Rows: " . $stmt->rowCount() . PHP_EOL;

// echo "Columns: " . $stmt->columnCount() . PHP_EOL;
// echo "Rows: " . $stmt->rowCount() . PHP_EOL;

// $stmt = $dbc->query('SELECT * FROM users');

// echo "Columns: " . $stmt->columnCount() . PHP_EOL;
// while ($row = $stmt->fetch()) {
//     print_r($row);
// }
// $stmt = $dbc->query('SELECT * FROM users');

// print_r($stmt->fetch());
// print_r($stmt->fetch(PDO::FETCH_ASSOC));
// print_r($stmt->fetch(PDO::FETCH_NUM));
// print_r($stmt->fetch(PDO::FETCH_BOTH));

// function getUsers() {
//     // Bring the $dbc variable into scope somehow

//     return $dbc->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
// }
// getUsers();

