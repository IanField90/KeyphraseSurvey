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
				echo '<br /><br />';
			?>
				
				<div id="content">
					<h1><?php echo $about_page_title;?></h1>
					<br />
					<?php include '../config/about.php';?>
				</div>
				<?php include '../footer.php'; ?>
				
		</div>
		
	</body>
</html>