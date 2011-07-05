<?php
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
	//TODO get session duplets for Word[new_pos][original_pos];
?>