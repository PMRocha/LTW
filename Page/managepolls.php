<?php
	session_start();
	if(isset($_SESSION['name']) && $_SESSION != '') {
		$db = new PDO('sqlite:../DataBase/Poll.db');
		$stmt = $db->prepare('SELECT * FROM Poll WHERE CreatorID = ?');
		$userID = $_SESSION['userID'];

		$stmt->execute(array($userID));

		?>
		<h3>Your poll's first questions:</h3>
		<?php

		while($row = $stmt->fetch()) {
			$pollID = $row['PollId'];
			?>
			<p>First poll question should go here... <a href="deletepoll.php?pollID=<?=$pollID?>">Delete this poll =(</a></p>
			<?php
		}

		?>
		<a href="personal.php">Return to your page</a>
		<?php
	}
?>