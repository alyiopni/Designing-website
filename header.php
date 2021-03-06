<?php
	// Sets up a session that will remember certain values we want to store across different PHP files.
	session_start();
	echo "<!DOCTYPE html>\n<html><head>";
	// functions.php is needed once.
	require_once 'functions.php';
	$userstr = ' (Guest)';
	
	// if a user is logged in $loggedin is true otherwise it is false.
	if(isset($_SESSION[ 'user' ]))
	{
		$user = $_SESSION['user'];
		$loggedin = TRUE;
		$userstr = " ($user)";
	}
	else $loggedin = FALSE; 

	// Shows apppname with logo 
	echo "<title>$appname$userstr</title><link rel = 'stylesheet' " .
	     "href = 'styles.css' type = 'text/css'>" .
	     "</head><body><center>$appname</center>" .
	     "<div class = 'appname'>$appname/$userstr</div>" .
	     "<script scr = 'javascript.js'></script>";

	// If $loggedin is true it shows project's feature otherwise it shows the sign up and log in pages.
	if($loggedin)
		echo "<br><ul class = 'menu'>" .
		     "<li><a href='members.php?view=$user'>Home</a></li>" .
		     "<li><a href='profile.php'>Edit Profile</a></li>" .
		     "<li><a href='logout.php'>Log out</a></li></ul><br>";

	else
		echo ("<br><ul class = 'menu'>" .
		      "<li><a href = 'index.php'>Home</a></li>" .
		      "<li><a href = 'signup.php'>Sign up</a></li>" .
		      "<li><a href = 'login.php'>Log in</a></li></ul><br>" .
		      "<span class = 'info'>&#8658; You must be logged in to " .
		      "view this page.</span><br><br>");
?>
