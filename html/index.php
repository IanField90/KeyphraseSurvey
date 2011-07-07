<html>
	<head>
		<title>Base - Home</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src ="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="javascript/form.js"></script>
	</head>
	<body>

		<?php
			session_start();
			$sel_home = "selected"; $sel_about = ""; //used for CSS
			$MAX_SELECTIONS = 15;
			include 'db_conn/config.php';
			include 'db_conn/opendb.php';
			$result = mysql_query("SELECT count(*) FROM entries");
			$result = mysql_fetch_array($result);
			$rand = rand(1, $result[0]);
		  	$_SESSION['entryID'] = $rand;
			$query = "SELECT * FROM Entries WHERE Entry_ID = ".$rand;
			$result = mysql_query($query);
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			if(count($result) == 0){
				//Error with DB query
			}
			include 'db_conn/closedb.php';
			$title = $row['corpus_title'];
			$body = $row['corpus_body'];
			$keywords = array($row['a1'], $row['a2'], $row['a3'], $row['a4'], $row['a5'], $row['b1'], $row['b2'], $row['b3'], $row['b4'], $row['b5'], $row['c1'], $row['c2'], $row['c3'], $row['c4'], $row['c5']);
			

			$sorted_keywords = $keywords;
			sort($sorted_keywords);
			
			$positions;
			for($i=0; $i<$MAX_SELECTIONS; $i++){
				for($j=0; $j<$MAX_SELECTIONS; $j++){
					if($keywords[$i] == $sorted_keywords[$j]){
						//If keyword i is now the same as j
						$positions[$i] = $j;
					}
				}
			}
			$_SESSION['positions'] = $positions;
			//TODO duplicate detection - one tickbox for 2+ db column entries
			
			echo '<div id="container">';
			include 'navigation_bar.php';
			echo '<br /><br />';
			echo '<div id="content"><h1>' . $title . '</h1>';
			echo '<p>' . $body . '<p>';
			echo'<form name="entry" action="process_entry.php" method="post">';
			echo '<input type="radio" name="inputChoice" value="options" onClick="radioSelection()"/>Select options from bellow.';
			echo '<table class="list">';
			
			//TODO duplicate display support
			for($i=1; $i<4; $i++){
				echo '<tr>';
				for($j=0; $j<5; $j++){
					echo '<td><input type="checkbox" name="selectedWords[]" onclick="chk_click()"/>' . $sorted_keywords[(($i-1)*5) + $j] . '</td>';
				}
				echo '</tr>';
			}
			echo '</table>';			
		?>

		<p />
		<input type="radio" name="inputChoice" value="none" onClick="radioSelection()"/>None of the above.
		<p />
		<input type="button" value="Submit" id="subButton" onClick="prepareForm()"/>
		</form>
		</div>
		<?php include 'footer.php'; ?>
		</div>
	</body>
</html>
