<?php
	session_start();
	if(isset($_SESSION['name']) && $_SESSION != '') {
		$db = new PDO('sqlite:../DataBase/Poll.db');
		$stmt = $db->prepare('SELECT * FROM Poll WHERE CreatorID = ?');
		$userID = $_SESSION['userID'];
		$stmt->execute(array($userID));

		$stmt2 = $db->prepare('SELECT * FROM Question WHERE QuestionPoll = ?');

		?>
		<div id="wrap">
			<div id="header">
				<h1>POLL RAVAGER 3000</h1>
				<br>
				<h2>Your poll's first questions:</h2>
			</div>
		
		<?php

		while($row = $stmt->fetch()) {
			$pollID = $row['PollId'];
			$stmt2->execute(array($pollID));
			if($row2 = $stmt2->fetch()) {
				$firstquestion = $row2['QuestionText'];
				?>
				<link rel="stylesheet" type="text/css" href="style.css">
				<div class="centered">
				<p><?=$firstquestion?> <a href="deletepoll.php?pollID=<?=$pollID?>">Delete this poll =(</a></p>
				
				<?php
			}
		}

		?>
		<a href="personal.php">Return to your page</a>
		</div>
		<div style="clear: both;"> </div>
		
		<div id="footer">
			
			<p>LTW FEUP 2014/2015</p>
			<p>Miguel Mendes, Pedro Rocha</p>
		</div>
		</div>
		<?php
	}
?>