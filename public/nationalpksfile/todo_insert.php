// <?php
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'codeup', 'password');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = 'CREATE TABLE todo_list (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    priority INT UNSIGNED,
    
    PRIMARY KEY (id)
)';

 //$dbc->exec($query);


$todo_list = [

	['name' => 'Groceries', 'priority' => 2], 

	['name' => 'Laundry', 'priority' => 3], 
	
	['name' => 'Gym', 'priority' => 1] 

	];

$stmt = $dbc->prepare('INSERT INTO todo_list (name, priority) VALUES (:name, :priority)');

	
foreach ($todo_list as $chore) {
    
    $stmt->bindValue(':name',  $chore['name'],  PDO::PARAM_STR);
    $stmt->bindValue(':priority', $chore['priority'], PDO::PARAM_STR);
    
    $stmt->execute();
}




