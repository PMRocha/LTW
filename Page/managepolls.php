<?php
	session_start();
	if(isset($_SESSION['name']) && $_SESSION != '') {
		$db = new PDO('sqlite:../DataBase/Poll.db');
		$stmt = $db->prepare('SELECT * FROM Poll WHERE CreatorID = ?');
		$userID = $_SESSION['userID'];
		$stmt->execute(array($userID));

		$stmt2 = $db->prepare('SELECT * FROM Question WHERE QuestionPoll = ?');

		?>
		<h3>Your poll's first questions:</h3>
		<?php

		while($row = $stmt->fetch()) {
			$pollID = $row['PollId'];
			$stmt2->execute(array($pollID));
			if($row2 = $stmt2->fetch()) {
				$firstquestion = $row2['QuestionText'];
				?>
				<p><?=$firstquestion?> <a href="deletepoll.php?pollID=<?=$pollID?>">Delete this poll =(</a></p>
				<?php
			}
		}

		?>
		<a href="personal.php">Return to your page</a>
		<?php
	}
?>