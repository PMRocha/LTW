<?php
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('SELECT * FROM Question');

	$stmt->execute();
	?>
	<h3>Available polls:</h3>
	<?php
	while($row = $stmt->fetch()) {
		?>
			<a href="poll.php?pollID=<?=$row['QuestionPoll']?>"><?=$row['QuestionText']?></a><p></p>
		<?php
	}
?>