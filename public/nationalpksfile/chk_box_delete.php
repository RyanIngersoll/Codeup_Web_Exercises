<?php

// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db','mkr', 'codeuprocks');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST['submit'])){
	  $stmt = $dbc->prepare('INSERT INTO todo(item) VALUES (:item)'); 

	  $stmt->bindValue(':item', $_POST['additem'], PDO::PARAM_STR);
	  $stmt->execute();
	}


if(isset($_POST['done'])){
	$checkbox = $_POST['checkbox'];
	
		for($i=0;$i<count($_POST['checkbox']);$i++){

		$del_id = $checkbox[$i];
		$stmt = $dbc->prepare("DELETE FROM todo WHERE id='$del_id'");
		$stmt->bindValue(':id', $del_id, PDO::PARAM_INT);

		$stmt->execute();
	
	}

}

$stmt = $dbc->prepare("SELECT * FROM todo LIMIT 10");
$stmt->execute();
$items =$stmt->fetchAll(PDO::FETCH_ASSOC);



?>



<html>
    <head>
    	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
            <link rel="stylesheet" href="/css/site.css">

    </head>

    <body style = "padding: 30px">
        <h1>Things to Do</h1>

        <form action="todolist.php" method="POST">
            <div><label class="checkbox-inline">
                <!--loop through array $items and output key => value pairs-, refactor to alternate syntax-->
               <?php foreach ($items as $item) : ?>
                    <li> <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $item['id']; ?>"><?= $item['item'] ?></li>
                <?php endforeach;?>
            </label> </div>
            <button type="btn-primary" name="done" value="done">DONE</button>
        </form>
            <!--Form to allow items to be added --> 
  

        <h4>Add Item to the List</h4>
        <form method="POST" action="todolist.php" >
            <p>
            <input type="text" id="newitem" name="additem" placeholder="item here">
            <button name="submit" value="submit"> + </button>
            </form>
            </p>



          
            
    </body>
    </html>

