<?php
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'codeup', 'password');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<?php

//var_dump($_GET);

$limit = 5;
$numRows = (int)$dbc->query("SELECT count(*) FROM todo_list")->fetchColumn();


$offset = isset($_GET['offset']) && ($_GET['offset'] > 0) && ($_GET['offset'] <= $numRows) ? intval($_GET['offset']) : 0;


function fixPage($offset, $limit){
          if ($offset > 0 && $offset < $limit){
              $newlimit = 1;
                  return $newlimit;
          }
          else{   
             	return $limit;
            }
        }

$fix = fixPage($offset, $limit);


function get_todo_list($dbc, $limit, $offset) {

	$stmt = $dbc->prepare("SELECT * FROM todo_list order by id asc LIMIT :limit OFFSET :offset");

	$stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
	$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
	$stmt->execute();

	return $stmt->fetchALL(PDO::FETCH_ASSOC);

}

function get_todo_list_prior($dbc, $limit, $offset) {

  $stmt = $dbc->prepare("SELECT * FROM todo_list order by priority asc LIMIT :limit OFFSET :offset");

  $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
  $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
  $stmt->execute();

  return $stmt->fetchALL(PDO::FETCH_ASSOC);

}

function get_todo_list_name($dbc, $limit, $offset) {

  $stmt = $dbc->prepare("SELECT * FROM todo_list order by name asc LIMIT :limit OFFSET :offset");

  $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
  $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
  $stmt->execute();

  return $stmt->fetchALL(PDO::FETCH_ASSOC);

  throwError($stmt);
    
    }

    function throwError($stmt){
      if(empty($stmt->fetchALL(PDO::FETCH_ASSOC))){
          throw new Exception("your todo list is empty");
        }
    }

function addChore($dbc){

    $stmt = $dbc->prepare('INSERT INTO todo_list (name, priority) VALUES (:name, :priority)');

    $stmt->bindValue(':name', $_POST['name'],  PDO::PARAM_STR);

    $stmt->bindValue(':priority', $_POST['priority'], PDO::PARAM_INT);

    $stmt->execute();
    header('Location: todo_list_sql.php');
}

      if(!empty($_POST['name'])){
          
          addChore($dbc);
       }


        if(isset($_POST['checkbox'])){
          
            $checkbox = $_POST['checkbox'];
          
            for($i=0;$i<count($_POST['checkbox']);$i++){

            $id = $checkbox[$i];
            $stmt = $dbc->prepare('DELETE FROM todo_list WHERE id= :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

          }
      }


  try {  


      if(isset($_POST['sort-type'])){

        if($_POST['sort-type'] == 'sort-name'){
      
          $todo_list = get_todo_list_name($dbc, $limit, $offset);
        }

        elseif($_POST['sort-type'] == 'sort-prior'){
      
          $todo_list = get_todo_list_prior($dbc, $limit, $offset);
        }

       elseif($_POST['sort-type'] == 'sort-id') {

          $todo_list = get_todo_list($dbc, $limit, $offset);
        }

      }
      else{
        $todo_list = get_todo_list_name($dbc, $limit, $offset);
      }
    }

    catch(Exception $e){
      $catcherror = $e->getMessage();
    }


?>
<!DOCTYPE html>
<html>
	<head>

        <title>"SQL TO DO LIST"</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    </head>
		<body style = "padding: 50px">

            <p>
               <? if($offset != 0):?>
                 <button><h4><a href="todo_list_sql.php?offset=<?=$offset - $fix;?>">PREV</a></h4></button> 
               <? endif; ?>

               <? if($offset + $limit < $numRows):?>
                  <button><h4><a href="todo_list_sql.php?offset=<?=$offset + $fix;?>">NEXT</a></h4></button>
                 
               <? endif; ?>
          </p>
			
      <h1>Prioritized mySQL Chore List</h1>
			 <h3>Rank 1(highest) to 5</h3>
       <h3><? echo "There are " . $numRows . " chores on the list"?></h3>

             <form action="todo_list_sql.php" method="POST">
              <div> 
               <? if(isset($_GET['offset'])) {
                    $i = $offset;
                    // $i++;
                  } else {
                    $i = 0;
                  }

                ?> 
                <?if(isset($todo_list)): ?> 
                  
                <?foreach($todo_list as $entry) : ?>
                  
                      <h2><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?=$entry['id'];  ?>"><? echo " item: " . ++$i . " " . $entry['name']; ?><?= " PRIORITY: " . " " . $entry['priority'] ?></h2> 
                    <?php endforeach;?>

                <?endif;?>
                           

                    </div>

                    <h2><button type="btn-primary" name="remove-entry" value="remove-entry">Remove</button></h2>

                  </form>

                  <form method = "POST">
                    <h3><input type="radio" name="sort-type" value="sort-name" id="sort-name"><? echo " "; ?><label for="sort-name"><? echo " "; ?>Name Sort</label><? echo " "; ?><input type="radio" name="sort-type" value="sort-prior" id="sort-prior"><? echo " "; ?><label for="sort-prior"><? echo " "; ?>Priority Sort</label><? echo " "; ?><input type="radio" name="sort-type" value="sort-id" id="sort-id"><? echo " "; ?><label for="sort-id"><? echo " "; ?>ID Sort</label></h3>
                    <h3><button type="submit" name="sortlist" value = "sortlist">SORT n DISPLAY</button></h3>
                  </form>

              <?php if(isset($catcherror)) :?>
                  <h1><?= $catcherror ?></h1>
                  <h1> YOU HAVE 20 SECONDS TO COMPLY.....</h1>
                  <h3>(or you can just enter a new chore)</h3>
                  <!-- <iframe width="640" height="390" src="//www.youtube.com/v/acdABwYJqks&autoplay=1" frameborder="0" allowfullscreen></iframe> -->
              <? endif; ?>

              <h3>"ADD NEW CHORE"</h3>

         <div class="col-xs-6 col-md-4">
            <form method="POST" action="todo_list_sql.php" class= "form-horizontal">

                <label for="name">name: </label><input type="text" name="name" id="name"placeholder="chore" class= "form-control"> <br>

                <label for="priority">priority: </label><input type="text" name="priority" id="priority"placeholder="enter 1 for highest 5 for lowest" class= "form-control"><br>

                <input type="submit" value="submit!!">
            </form> 
        </div>

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


		</body>
	</html>
