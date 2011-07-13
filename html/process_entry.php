<?php
	session_start(); //Make sure session variables are accessible by this page too
	$MAX_SELECTIONS = 15;
	$choices;
	
	// check the page hit is legitimate, visit - not just a hit
	if(!isset($_SESSION['entryID'])){
		echo 'This page cannot be viewed.';
		return -1;
	}
	
	// check all that were selected and create more friendly array to handle
	for($i=0; $i< count($_POST["choices"]); $i++){
		// is treated as a string
		if($_POST["choices"][$i] == "true"){
			$choices[$i] = true;
		}
		else{
			$choices[$i] = false;
		}
	}

	// get locations for DB update - not the same as the order on the page
	// construct a databse update string with 1 or 0 for booleans
 	$positions = $_SESSION['positions'];
	$db_choices_string = (int) $choices[$positions[0]];
	for($i=1; $i<$MAX_SELECTIONS; $i++){
		$db_choices_string = $db_choices_string . ', ' . (int)$choices[$positions[$i]];
 	}

	// track the user's IP to allow potential spam removal from the database
	$ip = $_SERVER['REMOTE_ADDR'];
	
	// date used to identify spam too
	$sql = "INSERT INTO selections (entry_id, user_ip, selection_time, a1, a2, a3, a4, a5, b1, b2, b3, b4, b5, c1, c2, c3, c4, c5) values(" . $_SESSION['entryID'] . ", '" . $ip . "', NOW(), " . $db_choices_string .")";
	include 'db_conn/config.php';
	include 'db_conn/opendb.php';
	mysql_query($sql); // Update the database
	include 'db_conn/closedb.php';
	echo 'OK';
	
?>

