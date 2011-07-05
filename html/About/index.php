<html>
	<head>
		<title>Base - About</title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<div id="container">
			<?php
			 	$sel_home = ""; $sel_about = "selected";
				include '../navigation_bar.php';	
				echo '<br /><br />'
			?>
				
				<div id="content">
					<h1>About</h1>
					<br />
					This is something awesome.
				</div>
			<?php include '../footer.php'; ?>
		</div>
	</body>
</html>