<?php
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('INSERT INTO Userino (password, userName) VALUES (?,?)');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	if($password == $password2) {
		$stmt->execute(array(hash("sha256", $password), $username));
		echo 'Registration successful!';
	}
?>