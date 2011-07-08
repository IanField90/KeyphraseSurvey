<?php
	//Use the config.php file to establish database connectivity
	//Straight-forward include to open the database.
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname);
?>