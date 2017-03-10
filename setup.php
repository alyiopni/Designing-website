<!DOCTYPE html>
<html>
	<head>
		<title>Setting up database</title>
	</head>
	<body>
		<h3>Setting up.....</h3>
		<?php
		
		
			require_once 'functions.php';
		
	
			// Creating tables memebers, messages, friends, profiles. In case of expanding any table columns a MYSQL drop table command needs to use before re-creating any table.	
			createTable('members',
				    'user VARCHAR(16),
				     pass VARCHAR(16),
				     INDEX(user(6))');

			createTable('friends',
				    'user VARCHAR(16),
				     friend VARCHAR(16),
				     INDEX(user(6)),
				     INDEX(friend(6))');

			createTable('profiles',
				    'user VARCHAR(16),
				     text VARCHAR(4096),
				     INDEX(user(6))');
		?>

			<br>...done.
	</body>
</html>
	
