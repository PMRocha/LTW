<?php
	$db = new PDO('sqlite:./DataBase/Poll.db');
	$stmt = $db->prepare('SELECT * FROM Userino WHERE userName = ?');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$stmt->execute(array($username));

	if($row = $stmt->fetch()) {
		echo 'You have successfully logged in, ' . $row['userName'] . '!';
	}
?>