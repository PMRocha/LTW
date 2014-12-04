<?php
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('UPDATE AnswerResult SET ResultCont = ResultCont + 1 WHERE AnswerResults = ?');

	$stmt->execute(array($_GET['answer']));

	
	echo "<div id='wrap'><div id='header'>";
	echo "<h1> Answered poll!\n</h1><br>";
	echo "<h2>\nRedirecting...</h2></div></div>";
	?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="refresh" content="3;url=../Page/personal.php" />
	<?php
?>