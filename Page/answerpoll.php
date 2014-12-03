<?php
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('UPDATE AnswerResult SET ResultCont = ResultCont + 1 WHERE AnswerResults = ?');

	$stmt->execute(array($_GET['answer']));

	echo 'Answered poll! Redirecting you...'
	?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="refresh" content="3;url=../Page/personal.php" />
	<?php
?>