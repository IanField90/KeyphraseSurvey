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
	$db_choices;
	for($i=0; $i<$MAX_SELECTIONS; i++){
		$db_choices[$i] = $choices[$positions[$i]]);
	}
	//TODO Use $db_choices to update the database
	
	//INSERT INTO table values ($_SESSION['entryID'], $db_choices[0 to $MAX_SELECTIONS]);
?>