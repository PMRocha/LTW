<?php
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('SELECT * FROM Question WHERE QuestionPoll = ?');

	$stmt->execute(array($_GET['pollID']));

	while($row = $stmt->fetch()) {
		?>
		<h3><?=$row['QuestionText']?></h3>
		<form action="answerpoll.php" method="get">
			<?php
				$stmt2 = $db->prepare('SELECT * FROM Answer WHERE AnswerToQuestion = ?');
				$stmt2->execute(array($row['QuestionID']));
				while($answerRow = $stmt2->fetch()) {
					?>
					<input type="radio" name="answer" value="<?=$answerRow['AnswerID']?>"><?=$answerRow['AnswerOption']?><p></p>
					<?php
				}
			?>
			<input type="submit" value="Answer">
		</form>
		<?php
	}
?>