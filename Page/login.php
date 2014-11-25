<?php
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('SELECT * FROM Userino WHERE userName = ?');

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$stmt->execute(array($username));
	if($row = $stmt->fetch()) {
		if($row['password'] == hash("sha256", $password)){
			echo 'You have successfully logged in, ' . $row['userName'] . '!';
		} else {
			echo "Either your username or password are incorrect.\n";		}
	} else {
		echo "No user by that name.";
	}
?>