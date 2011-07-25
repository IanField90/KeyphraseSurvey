<?php 
	//This ensures that the locale customisations are included
	include '../config/locales.php';
?>
<html>
	<!-- This file serves as the about page, populated by configuration settings -->
	<head>
		<title><?php echo $site_name . " - " . $privacy_page_title;?></title>
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
					<h1><?php echo $privacy_page_title; ?></h1>
					<br />
					We take our privacy seriously; as such we only store visitor IP addresses, and their survey responses, in order to facilitate result filtering and administration. This information is not used for any other purpose.
				</div>
				<?php include '../footer.php'; ?>
		</div>
	</body>
</html>