<html>
	<head>
		<title>Base - Home</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="javascript/form.js"></script>
	</head>
	<body>

		<?php
		$sel_home = "selected"; $sel_about = "";
		echo '<div id="container">';
		include 'navigation_bar.php';
		echo '<br /><br />';
		//	$rand = 4;
		//	$query = "SELECT * FROM Entries WHERE Entry_ID = ".$rand;
		//	include 'db_conn/config.php';
		//	include 'db_conn/opendb.php';
		//	$result = mysql_query($query);
		//	$row = mysql_fetch_array($result, MYSQL_ASSOC);
			
			echo '<div id="content">';
			$title = "Title"; // $row['Corpus_Title'];
			$body = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id mauris arcu. Nam mollis tellus vel turpis facilisis et aliquet velit ultricies. Suspendisse elit nibh, elementum a faucibus eu, eleifend vitae quam. Sed vitae tellus quis libero scelerisque vehicula tempus at elit. Nullam ac lectus nunc. Mauris eget dui dui. Curabitur est ipsum, tincidunt nec rhoncus eget, vehicula et ligula. Vestibulum lectus tellus, mollis ac molestie eu, ornare sit amet tellus. Aliquam sed aliquam justo. In a felis eros, at molestie purus."; 
			//$row['Corpus_Body'];
			$keywords = array("Bravo", "Alpha", "Charlie", "Delta", "Echo", "Foxtrot", "Golf", "Hotel", "Indigo", "Juliette", "Kilo", "Leema", "Mike", "November", "Oscar"); 
			//array($row['A1'], $row['A2'], $row['A3'], $row['A4'], $row['A5'], $row['B1'], $row['B2'], $row['B3'], $row['B4'], $row['B5'], $row['C1'], $row['C2'], $row['C3'], $row['C4'], $row['C5']);
			

			$sorted_keywords = $keywords;
			sort($sorted_keywords);
			$_SESSION['keywords_original'] = $keywords; //used to check original location
			$_SESSION['keywords_sorted'] = $sorted_keywords; //used to check ordered location
			//Use ordered checkbox index (selectedWords.index;)
			
			
			echo '<h1>' . $title . '</h1>';
			echo '<p>';
			echo $body;
			echo '<p>';
			echo'<form name="entry" action="" method="post">';
			echo '<input type="radio" name="inputChoice" value="options" onClick="radioSelection()"/>Select options from bellow.';
			echo '<table class="list">';
			for($i=1; $i<4; $i++){
				echo '<tr>';
				for($j=0; $j<5; $j++){
					echo '<td><input type="checkbox" name="selectedWords" />' . $sorted_keywords[(($i-1)*5) + $j] . '</td>';
				}
				echo '</tr>';
			}
			echo '</table>';			
		//	include 'db_conn/closedb.php';
		?>

		<p />
		<input type="radio" name="inputChoice" value="none" onClick="radioSelection()"/>None of the above.
		<p />
		<input type="button" value="Submit" id="subButton" onClick="prepareForm()"/>
		</form>
		
		<?php include 'footer.php'; ?>
	</body>
</html>
