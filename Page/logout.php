<?php
session_start();
	if(isset($_SESSION['name']) && $_SESSION['name'] != '') {
		$_SESSION['name'] = '';
		session_destroy();
		echo "Logged out! Redirecting...";
		?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="refresh" content="3;url=starthere.html"/>
		<?php
	}
?>