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
					<h1>About</h1>
					<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id mauris arcu. Nam mollis tellus vel turpis facilisis et aliquet velit ultricies. Suspendisse elit nibh, elementum a faucibus eu, eleifend vitae quam. Sed vitae tellus quis libero scelerisque vehicula tempus at elit. Nullam ac lectus nunc. Mauris eget dui dui. Curabitur est ipsum, tincidunt nec rhoncus eget, vehicula et ligula. Vestibulum lectus tellus, mollis ac molestie eu, ornare sit amet tellus. Aliquam sed aliquam justo. In a felis eros, at molestie purus.
					<?php include '../footer.php'; ?>
				</div>
		</div>
	</body>
</html>