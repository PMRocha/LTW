<?php
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('SELECT * FROM Question WHERE QuestionPoll = ?');

	$stmt->execute(array($_GET['pollID']));

	while($row = $stmt->fetch()) {
		?>
		<link rel="stylesheet" type="text/css" href="style.css">
		
		<div id="wrap">
			<div id="header">
				<h1>POLL RAVAGER 3000</h1>
				<br>
				<h2>Answer Poll</h2>
			</div>
		<div class="centered">
		<h2><?=$row['QuestionText']?></h2><br>
		<form action="answerpoll.php" method="get">
			<?php
				$stmt2 = $db->prepare('SELECT * FROM Answer WHERE AnswerToQuestion = ?');
				$stmt2->execute(array($row['QuestionID']));
				while($answerRow = $stmt2->fetch()) {
					?>
					
					<input type="radio" name="answer" value="<?=$answerRow['AnswerID']?>"><?=$answerRow['AnswerOption']?><p></p>
					<br>
					<?php
					
				}
			?>
			<input class="myButton" type="submit" value="Answer">
			</div>
			<div style="clear: both;"> </div>
		
			<div id="footer">
			
			<p>LTW FEUP 2014/2015</p>
			<p>Miguel Mendes, Pedro Rocha</p>
			</div>
			
			</div>
		</form>
		<?php
	}
?>