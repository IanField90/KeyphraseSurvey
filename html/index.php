<?php 
	//This ensures that the locale customisations are included
	include 'config/locales.php';
	session_start();
?>
<html>
	<head>
		<title><?php echo $site_name . " - " . $link_home;?></title>
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src ="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="javascript/form.js"></script>
	</head>
	<body>

		<?php
			$sel_home = "selected"; $sel_about = ""; //used for CSS
			$MAX_SELECTIONS = 15;
			//Set up and open database
			include 'db_conn/config.php';
			include 'db_conn/opendb.php'; //If this fails then
			
			//Find out the number of database rows
			$result = mysql_query("SELECT count(*) FROM entries");
			$result = mysql_fetch_array($result);
			if(count($result) == 0){
				echo 'An error occurred while retrieving from the database';
				return -1;
			}
			
			//Get a random entry from the database, ensuring that it is in range
			$rand = rand(1, $result[0]);
		  	$_SESSION['entryID'] = $rand;
			$query = "SELECT * FROM entries WHERE entry_id = ".$rand;
			$result = mysql_query($query);
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			if(count($result) == 0){
				//In theory should only happen if not all rows in 'entries' are sequential
				echo 'An error occurred while retrieving from the database';
				return -1;
			}
			include 'db_conn/closedb.php';
			
			//If this is reached then there is a database row and the rest of the page should complete
			$title = $row['corpus_title'];
			$body = $row['corpus_body'];
			$keywords = array($row['a1'], $row['a2'], $row['a3'], $row['a4'], $row['a5'], $row['b1'], $row['b2'], $row['b3'], $row['b4'], $row['b5'], $row['c1'], $row['c2'], $row['c3'], $row['c4'], $row['c5']);
			

			$sorted_keywords = $keywords;
			sort($sorted_keywords);
			
			// duplicate detection - one tickbox for 2+ db column entries
			//Unique keywords, then determine locations
			$sorted_keywords = array_unique($sorted_keywords); //Index is retained, but empty
			
			$positions;
			// i is original location
			for($i=0; $i<$MAX_SELECTIONS; $i++){
				// j is new location
				for($j=0; $j<count($sorted_keywords); $j++){
					if($keywords[$i] == $sorted_keywords[$j]){
						//If keyword i is now the same as j
						$positions[$i] = $j; //j is new location, stored in index i

					}
				}
			}
			$_SESSION['positions'] = $positions; //store for access on updating the database
			
			echo '<div id="container">';
			include 'navigation_bar.php';
			
			echo '<br /><br />';
			echo '<div id="content">';
			echo 'Please read the following article and then select the keywords or phrases which you find relevent to the article.';
			echo '<h1>' . $title . '</h1>';
			echo '<br />' . $body . '<p /><br />';
			echo '<form name="entry" action="process_entry.php" method="post">';
			echo '<input type="radio" name="inputChoice" value="options" onClick="radioSelection()" />'. $sel_bellow;
			echo '<table class="list">';
			
			$counter = 0; //Used for keyword index
			$count_max = count($sorted_keywords);
			for($i=0; $i<3; $i++){
				//rows
				echo '<tr>';
				for($j=0; $j<5; $j++){
					//columns
					if($counter < $count_max){
						//if keyword array is not blank (retained index) then display check box for it
						if($sorted_keywords[$counter] != NULL){
							echo '<td><input type="checkbox" name="selectedWords[]" onclick="chk_click()"/></td>'.
							 '<td class="keyword">'. $sorted_keywords[$counter] .'</td>';
						}else{
							//empty index so allow another item to be processed
							if($count_max < 15){
								$count_max++;//allow another check box to be printed
								//Condition prevents null DB entries causing an infinite loop
							}
							$j--;//don't just leave an empty check box or gap
						}
						$counter++;	
					}
				}
				echo '</tr>';
			}
			echo '</table>';			
		?>

		<p />
		<input type="radio" name="inputChoice" value="none" onClick="radioSelection()"/><?php echo $sel_none; ?>
		<p />
		<br />
		<input type="button" value="Submit" id="subButton" onClick="prepareForm()"/>
		</form>
		</div>
		<?php include 'footer.php'; ?>
		</div>
	</body>
</html>
