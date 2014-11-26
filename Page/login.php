<?php
session_start();
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('SELECT * FROM Userino WHERE userName = ?');

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$stmt->execute(array($username));
	if($row = $stmt->fetch()) {
		if($row['password'] == hash("sha256", $password)){
			$_SESSION['name'] = $row['userName'];
			$_SESSION['userID'] = $row['UserID'];
			echo "<div id='wrap'><div id='header'>";
			echo "<h1> You have successfully logged in, " . $row['userName'] . " !\n</h1><br>";
			echo "<h2>\nRedirecting...</h2></div></div>";
			?>
			<link rel="stylesheet" type="text/css" href="style.css">
			<meta http-equiv="refresh" content="3;url=../Page/personal.php" />

			<?php
			die();
		} else {
			?>
			<link rel="stylesheet" type="text/css" href="style.css">
			<meta http-equiv="refresh" content="3;url=../Page/starthere.html" />
			<?php
			echo "Either your username or password are incorrect.\n";
			echo "\nRedirecting...";
		}	
	} else {
		echo "No user by that name.";
	}
session_destroy();
?>