<?php

	//Assigning database information and connecting with database.
	$dbhost = 'localhost';
	$dbname = 'kawsarspowerhouse';
	$dbuser = 'kawsar';
	$dbpass = 'kawsarpsw';
	$appname = "Kawsar's Den";

	$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if($connection->connect_error)
	{
		echo "Falied to connect"; 
		die($connection->connect_error);
	}
	else
	{
		echo "Connected successfully";
	}
	// Checks whether a table already exists and, if not, creates it.
	function createTable($name, $query)
	{
		queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
		echo "Table '$name' created or already exists.<br>";
	}

	// Issues a query to MYSQL, outputting an error message if it fails.
	function queryMysql($query)
	{
		global $connection;
		$result = $connection->query($query);
		if(!$result) die($connection->error);
		return $result;
	}

	// Destroys a PHP session and clears its data to log users out
	function destroySession()
	{
		$_SESSION = array();
		
		if(session_id() != "" || isset($_COOKIE[session_name()]))
			setcookie(session_name(), '', time()-2592000, '/');
		session_destroy();
	}

	// Removes potentially malicious code or tags from user input
	function sanitizeString($var)
	{
		global $connection;
		$var = strip_tags($var);
		$var = htmlentities($var);
		$var = stripslashes($var);
		return $connection->real_escape_string($var);
	}

	// Displaysa user's image and "About Me" message
	function showProfile($user)
	{
		if(file_exists("$user.jpg"))
			echo "<img src= '$user.jpg' style='float:left;'>";

		$result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

		if($result->num_rows)
		{
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo stripslashes($row['text']). "<br style='clear:left;'<br>";
		}
	}
?>
