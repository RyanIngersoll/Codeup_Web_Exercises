<?php
require 'dbconnection.php';
?>
<?php

$limit = 4;
$numRows = (int)$dbc->query("SELECT count(*) FROM parks")->fetchColumn();


$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

// function fixPage($offset, $limit){
//         if ( $offset - $limit < 0){
//                 $offset = $limit;
//                  return $offset; }
//           }

// $fix = fixPage($offset, $limit);


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
           <p>
           <? if($offset != 0 && ($offset - $limit >= 0)):?>
	           <a href="national_parks.php?offset=<?=$offset - $limit;?>">PREV</a> 
           <? endif; ?>

           <? if($offset + $limit < $numRows):?>
           		<a href="national_parks.php?offset=<?=$offset + $limit;?>">NEXT</a>
	           
           <? endif; ?>

           
           </p>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		</body>
	</html>

	<!-- INSERT INTO `parks` (`id`, `name`, `location`, `date_established`, `area_in_acres`)
VALUES
	(1, 'Arcadia', 'Maine', '1919-02-26', 47389.67),
	(2, 'American Samoa', 'American Samoa', '1988-10-31', 9000.00),
	(3, 'Arches', 'Utah', '1971-11-28', 76518.98),
	(4, 'Badlands', 'S.Dakota', '1978-11-28', 242755.94),
	(5, 'Big Bend', 'Texas', '1944-06-12', 801163.19),
	(6, 'Biscayne', 'Florida', '1980-06-28', 172924.06),
	(7, 'Black Canyon of the Gunnison', 'Colorado', '1999-10-21', 32950.03),
	(8, 'Bryce Canyon', 'Utah', '1928-02-25', 35835.00),
	(9, 'Canyonlands', 'Utah', '1964-09-12', 337597.84),
	(10, 'Capitol Reef', 'Utah', '1971-12-18', 241904.27); -->

