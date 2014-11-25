<?php
session_start();
	echo "Starting.";

	if(isset($_SESSION['name']) && $_SESSION['name'] != '') {
		echo "Loading personal page";
		include('personalcontent.php');
	} else {
		echo "Something failed.\n";
		echo $_SESSION['name'];
	}
?>