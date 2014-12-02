<?php
	session_start();
	if(isset($_SESSION['name']) && $_SESSION['name'] != '') {
		$pollID = $_GET['pollID'];

		$db = new PDO('sqlite:../DataBase/Poll.db');
		$stmt = $db->prepare('DELETE FROM Poll WHERE PollId = ?');
		$stmt2 = $db->prepare('SELECT * FROM Poll WHERE PollId = ?');

		$stmt2->execute(array($pollID));

		if($row = $stmt2->fetch()) {
			echo $row['CreatorID'] . $_SESSION['userID'];
			if($row['CreatorID'] != $_SESSION['userID']) {
				?>
				<img src="idontthinkso.png" alt="I don't think so...">
				<link rel="stylesheet" type="text/css" href="style.css">
				<meta http-equiv="refresh" content="3;url=../Page/managepolls.php" />
				<?php
				die();
			}
		}

		$stmt->execute(array($pollID));
		?>
			<link rel="stylesheet" type="text/css" href="style.css">
			<meta http-equiv="refresh" content="3;url=../Page/managepolls.php" />
		<?php
		echo "Deleting your poll...";
	}
?>