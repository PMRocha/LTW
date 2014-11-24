<?php
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('SELECT * FROM Userino WHERE userName = ? AND password = ?');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$stmt->execute(array($username, $password));

	if($row = $stmt->fetch()) {
		echo 'You have successfully logged in, ' . $row['userName'] . '!';
	} else {
		echo 'Either your username or password are incorrect.';
	}
?>