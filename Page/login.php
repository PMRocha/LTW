<?php
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('SELECT * FROM Userino WHERE userName = ? AND password = ?');

	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$stmt->execute(array($username, $password));

	if($row = $stmt->fetch()) {
		echo 'You have successfully logged in, ' . $row['userName'] . '!';
		echo password_hash($_POST['password'], PASSWORD_DEFAULT);
	} else {
		echo 'Either your username or password are incorrect.';
	}
?>