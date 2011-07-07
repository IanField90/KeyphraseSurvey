<?php
	session_start();
	$MAX_SELECTIONS = 15;
	$choices;
	
	//check all that were selected and create more friendly array to handle
	for($i=0; $i< count($_POST["choices"]); $i++){
		if($_POST["choices"][$i] == "true"){
			$choices[$i] = true;
		}
		else{
			$choices[$i] = false;
		}
	}
	echo 'choices done';
	// get locations for DB update - not the same as the order on the page
 	$positions = $_SESSION['positions'];
	$db_choices_string = (int) $choices[$positions[0]];
	
	for($i=1; $i<$MAX_SELECTIONS; $i++){
		$db_choices_string = $db_choices_string . ', ' . (int)$choices[$positions[$i]];
 	}

	$ip = $_SERVER['REMOTE_ADDR'];	
	$sql = "INSERT INTO selections (entry_id, user_ip, selection_time, a1, a2, a3, a4, a5, b1, b2, b3, b4, b5, c1, c2, c3, c4, c5) values(" . $_SESSION['entryID'] . ", '" . $ip . "', NOW(), " . $db_choices_string .")";
	include 'db_conn/config.php';
	include 'db_conn/opendb.php';
	//Update the database
	mysql_query($sql);
	include 'db_conn/closedb.php';
	
?>

