<?php
	session_start();
	if(isset($_SESSION['name']) && $_SESSION['name'] != '') {
		$db = new PDO('sqlite:../DataBase/Poll.db');
		$stmt2 = $db->prepare('SELECT * FROM AnswerToPoll WHERE AnsweredPollID = ? AND AnsweredUserID = ?');
		$stmt2->execute(array($_GET['pollID'], $_SESSION['userID']));

		if($row = $stmt2->fetch()){
			echo "<div id='wrap'><div id='header'>";
			echo "<h1> You already answered this poll... =(\n</h1><br>";
			echo "<h2>\nRedirecting...</h2></div></div>";
			
		} else {
			$stmt = $db->prepare('UPDATE AnswerResult SET ResultCont = ResultCont + 1 WHERE AnswerResults = ?');
			$stmt->execute(array($_GET['answer']));
			$stmt3 = $db->prepare('INSERT INTO AnswerToPoll (AnsweredPollID, AnsweredUserID) VALUES (?, ?)');
			$stmt3->execute(array($_GET['pollID'], $_SESSION['userID']));

	
			echo "<div id='wrap'><div id='header'>";
			echo "<h1> Answered poll!\n</h1><br>";
			echo "<h2>\nRedirecting...</h2></div></div>";
		}
		?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="refresh" content="3;url=../Page/personal.php" />
		<?php
	}
?>