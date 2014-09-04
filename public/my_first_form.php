<?php

var_dump($_POST);
var_dump($_GET);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>My First Form</title>
    </head>
    <body>
    	<form method="POST">
    		<p> <input type="submit" value="Login">
    		</p>
		    <p>
		    	<label for="first_name">First Name</label>
		        <input type="text" name="first_name" id="first_name" placeholder="First"/>
		        <!-- name sets the key in the array -->
		    </p>
		  	
		    <p>
		        <label for="last_name">Last Name</label>
		        <input type="text" name="last_name" id="last_name" placeholder="Last"/>
		    </p>
		    <p>
		        <label for="username">Username</label>
		        <input type="text" name="username" id="username" placeholder="Username"/>
		    </p>
		    <p>
		        <label for="password">password</label>
		        <input type="password" name="password" id="password" placeholder="password"/>
		    </p>
		    <p>
		        <label for="comments">comments</label>
		        <input type="comments" name="comments" id="comments"placeholder="comments" />
		    </p>
		    <p>
		        <input type="submit">
		    </p>
	</form>

	<form method="POST">
		<p>
		<label for="email_destination">email address</label>
		<input type="email@email.com" name="email@email.com" id="email@email.com"placeholder="email@email.com"/>
		</p>
		
		<textarea id="email_body" name="email_body" rows="5" cols="40">Type Email Here</textarea/>

		<h2>What kind of day are you having?</h2>

		<p>
		<label>
		<input type="radio" id="options" name= "emotional state" value="have a nice day!" > (:
		</label>
		</p>

		<p>
		<label>
		<input type="radio" id="options" name= "emotional state" value="have an ok day!" > |:
		</label>
		</p>

		<p>
		<label>
		<input type="radio" id="options" name= "emotional state" value="have a rotten day!" > ):
		</label>
		</p>

		<p>What operating systems have you used?</p>
		<p>
		<label>
		<input type="checkbox" id="os1" name="os[]" value="linux"> Linux</label>
		<label>
		<input type="checkbox" id="os2" name="os[]" value="osx"> OS X</label>
		<label>
		<input type="checkbox" id="os3" name="os[]" value="windows"> Windows</label>
		</p>

			<input type="submit" value="send email now">

		<p>
		<label for="transmission">Select your transmission type: </label>
		<select id="transmission" name="transmission">
    	<option>Automatic</option>
    	<option selected>Manual</option>
		</select> 
		<input type="submit" value="submit test">
		</p>


		<p>
		<label for="os">What operating systems have you used?
		</label>
		<select id="os" name="os[]" multiple>
    	<option value="linus">Linux</option>
    	<option value="osx">OS X</option>
    	<option value="windows">Windows</option>
    	</select>
    	<input type="submit" value="submit test">
		</p>

		

   	</form> 





    </body>
</html>


















