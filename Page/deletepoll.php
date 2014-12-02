<?php
	$pollID = $_GET['pollID'];

	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('DELETE FROM Poll WHERE PollId = ?');

	$stmt->execute(array($pollID));
	?>
		<meta http-equiv="refresh" content="3;url=../Page/managepolls.php" />
	<?php
	echo "Deleting your poll..."
?>