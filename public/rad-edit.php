<?php

require 'dbconnect.php';

require_once('rad.class.php');

$adId = $_GET['id'];
$ad = new rad($dbc, $adId);

if (!empty($_POST)){
//$_POST retrieves variables from a POST method, such as (generally) forms.
	$ad->title = $_POST['title'];
	$ad->body = $_POST['body'];
	$ad->contactName = $_POST['contact_name'];
	$ad->contactEmail = $_POST['contact_email'];

	//save all ads
	$ad->save();

	//redirect to ad show view ???????
	header('location: rad-view.php?id=' . $ad->id);
	exit;

}
?>

<?php include('header.php'); ?>
 
    <div class="container">
        <h1>Create a New Ad</h1>
        <form role="form" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="<?= $ad->title; ?>" class="form-control" id="title" name="title" placeholder="A descriptive title for your ad">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body" rows="6"><?= $ad->body; ?></textarea>
            </div>
            <div class="form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" value="<?= $ad->contactName; ?>" class="form-control" id="contact_name" name="contact_name" placeholder="Who you gonna call?">
            </div>
            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" value="<?= $ad->contactEmail; ?>" class="form-control" id="contact_email" name="contact_email" placeholder="Email address to contact at">
            </div>
            <a href="rads.php" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Ad</button>
        </form>
    </div>
 
<?php include('footer.php'); ?>
