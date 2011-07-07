<?php
	session_start();
	$MAX_SELECTIONS = 15;
	$choices;
	for($i=0; $i<15; $i++){
		if($_POST["choices"][$i] == "true"){
			$choices[$i] = true;
			echo '1';
		}
		else{
			$choices[$i] = false;
			echo '0';
		}
	}
	// get session duplets for Word[new_pos][original_pos];
 	$positions = $_SESSION['positions'];
	$db_choices_string;
 	for($i=0; $i<$MAX_SELECTIONS; $i++){
		$db_choices_string += ',' . $choices[$positions[$i]];
 	}


	include 'db_conn/config.php';
	include 'db_conn/opendb.php';
	//TODO Use $db_choices to update the database (boolean)
	//$ip = $_SERVER['REMOTE_ADDR'];
	$sql = "INSERT INTO selections (entry_id, user_ip, selection_time, a1, a2, a3, a4, a5, b1, b2, b3, b4, b5, c1, c2, c3, c4, c5) " 
	$sql = $sql . "values("$_SESSION['entryID'] . ", " . $ip . ", 'NOW()', " . $db_choices_string);
	include 'db_conn/closedb.php';
?>