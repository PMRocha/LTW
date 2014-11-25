<?php
session_start();
	if(isset($_SESSION['name']) && $_SESSION['name'] != '') {
		include('personalcontent.php');
	} else {
		echo "Something failed.\n";
		echo $_SESSION['name'];
	}
?>