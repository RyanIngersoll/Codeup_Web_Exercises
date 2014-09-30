<?php
 
require 'dbconnect.php';
 
require_once('Ad.class.php');
 
$adId = $_GET['id'];
$ad = new Ad($dbc, $adId);
 
?>
 
<?php include('header.php'); ?>
 
    <div class="container">
    	<h1>
            <?= htmlspecialchars($ad->title); ?>
            <small><a href="ad-edit.php?id=<?= $ad->id; ?>">Edit</a></small>
        </h1>
    	<p>Posted at: <?= htmlspecialchars($ad->createdAt->format('l, F jS, Y')); ?></p>
    	<p><?= htmlspecialchars($ad->body); ?></p>
    	<h2>Contact Info:</h2>
    	<p>
    		<?= htmlspecialchars($ad->contactName); ?><br>
    		<a href="mailto:<?= htmlspecialchars($ad->contactEmail); ?>"><?= htmlspecialchars($ad->contactEmail); ?></a>
    	</p>
    </div>
 
<?php include('footer.php'); ?>