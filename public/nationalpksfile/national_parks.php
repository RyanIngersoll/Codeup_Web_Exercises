<?php
require 'natparkdbconnection.php';
?>

<?php
//require once 'filestore.php';
$limit = 20;
$numRows = (int)$dbc->query("SELECT count(*) FROM parks")->fetchColumn();


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


function getParks($dbc, $limit, $offset) {

	 //return $dbc->query("SELECT * FROM parks LIMIT $limit OFFSET $offset")->fetchALL(PDO::FETCH_ASSOC);
	$stmt = $dbc->prepare("SELECT * FROM parks LIMIT :limit OFFSET :offset");

	$stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
	$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
	$stmt->execute();

	return $stmt->fetchALL(PDO::FETCH_ASSOC);

}


//var_dump(getParks($dbc));

$national_parks = getParks($dbc, $limit, $offset);



function addPark($dbc){

    $stmt = $dbc->prepare('INSERT INTO parks (name, location, date_established, area_in_acres, park_description) VALUES (:name, :location, :date_established, :area_in_acres, :park_description)');

    $stmt->bindValue(':name', $_POST['name'],  PDO::PARAM_STR);

    $stmt->bindValue(':location', $_POST['location'], PDO::PARAM_STR);
    $stmt->bindValue(':date_established',  $_POST['date_established'],  PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres', $_POST['area_in_acres'], PDO::PARAM_INT);
    $stmt->bindValue(':park_description',  $_POST['park_description'],  PDO::PARAM_STR);

    $stmt->execute();
}

      if(!empty($_POST)){

          addPark($dbc);
       }

?>


<!DOCTYPE html>
<html>
	<head>

        <title>"National Parks"</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    </head>
		<body>
			<h1>National Parks</h1>
			<div class="table-responsive">
              <table class="table">
                 <tr>
                	<th>ID</th>
	                <th>Name</th>
	                <th>Location</th> 
	                <th>Date Established</th>
	                <th>Area in Acres</th> 
	                <th>Park Description</th>
                 </tr>

                 <?foreach($national_parks as $entry): ?>
                    <tr>
                    	<td><?=$entry['id'];?>
                    	<td><?= $entry['name'];?>
                    	<td><?= $entry['location'];?>
                        <td><?= $entry['date_established'];?>
                        <td><?= $entry['area_in_acres'];?>
                        <td><?= $entry['park_description'];?>
                    </tr>
                    <? endforeach; ?> 
                
              </table>

              <?php if(isset($catcherror)) :?>
                  <h1><?= $catcherror ?></h1>
                  <h1> YOU HAVE 20 SECONDS TO COMPLY</h1>
                  <iframe width="640" height="390" src="//www.youtube.com/v/acdABwYJqks&autoplay=1" frameborder="0" allowfullscreen></iframe>
              <? endif; ?>

              <h3>"ADD NEW PARK"</h3>

         <div class="col-xs-6 col-md-4">
            <form method="POST" action="national_parks.php" class= "form-horizontal">

                <label for="name">name: </label><input type="text" name="name" id="name"placeholder="name" value="<? $_POST ? $_POST['name']: "" ?>" class= "form-control"> <br>

                <label for="location">location: </label><input type="text" name="location" id="location"placeholder="location" class= "form-control"><br>

                <label for="date_established">date established: </label><input type="text" name="date_established" id="date_established"placeholder="yyyy-mm-dd" class= "form-control"> <br>

                <label for="area_in_acres">area in acres: </label><input type="text" name="area_in_acres" id="area_in_acres"placeholder="0000.00" class= "form-control"> <br>

                <label for="park_description">park description: </label><input type="text" name="park_description" id="park_description"placeholder="park description" class= "form-control"> <br>

                <input type="submit" value="submit!!">
            </form> 
        </div>
           <p>
           <? if($offset != 0):?>
	           <a href="national_parks.php?offset=<?=$offset - $fix;?>">PREV</a> 
           <? endif; ?>

           <? if($offset + $limit < $numRows):?>
           		<a href="national_parks.php?offset=<?=$offset + $fix;?>">NEXT</a>
	           
           <? endif; ?>

           
           </p>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		</body>
	</html>


