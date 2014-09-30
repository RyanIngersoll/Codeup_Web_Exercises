<?php

require 'dbconnect.php';

require_once('rad.class.php');

if(!empty($_POST)){
	//init new ad
	$ad = new rad($dbc);

	$ad->title = $_POST['title'];
	$ad->body = $_POST['body'];
	$ad->contactName = $_POST['contact_name'];
	$ad->contactEmail = $_POST['contact_email'];
	//save all ads
	$ad->save();

	// redirect to ad show view
	header('location: rad-vew.php?id=' . $ad->id);
	exit;
}
// $_GET retrieves variables from the querystring, or your URL.
// $_POST retrieves variables from a POST method, such as (generally) forms.
// $_REQUEST is a merging of $_GET and $_POST where $_POST overrides $_GET. Good to use $_REQUEST on self refrential forms for validations.
?>

<?php include('header.php'); ?>
	
	<div class="container">
		<h1>Create a new Ad</h1>
		<form role="form" method="POST">
			<div class="form-group">
				<label for="title">TITLE</label>
				<input type="text" class="form-control" id="title" name="title" placeholder="A descriptive title for your ad">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body" rows="6"></textarea>
            </div>
            <div class="form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Who you gonna call?">
            </div>
            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Email address to contact at">
            </div>
            <a href="ads.php" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Ad</button>
        </form>
    </div>

<?php include('footer.php'); ?>



















