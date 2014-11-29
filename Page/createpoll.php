<?php
session_start();
	if(isset($_SESSION['name']) && $_SESSION['name'] != '') {
	
		$db = new PDO('sqlite:../DataBase/Poll.db');
		$db->beginTransaction();
	
		$cont = 0;
		foreach ($_POST as $i => $value) {
			if($cont >0){
				echo("Answer:".$_POST[$i]."\n");
				$stmt = $db->prepare('INSERT INTO Answer(AnswerOption,AnswerToQuestion)
							SELECT  ?, QuestionID
							FROM    Question 
							ORDER BY QuestionID DESC LIMIT 1');
				$stmt->execute(array($_POST[$i]));
				
				$stmt = $db->prepare('INSERT INTO AnswerResult(AnswerResults,ResultCont)
							SELECT   AnswerID, 0
							FROM    Answer 
							ORDER BY AnswerID DESC LIMIT 1');
				$stmt->execute();
			}
			else{
				echo("Question:".$_POST[$i]."\n");
				$stmt = $db->prepare('INSERT INTO Poll(CreatorID) VALUES (?)');
				$stmt->execute(array($_SESSION['userID']));
				//store question poll relation
				$stmt = $db->prepare('INSERT INTO Question(QuestionText,QuestionPoll)
							SELECT  ?, PollID
							FROM    Poll 
							ORDER BY PollID DESC LIMIT 1');
				$stmt->execute(array($_POST[$i]));
			}
			$cont++;
		}

		$db->commit();
	}

	$db = new PDO('sqlite:../DataBase/Poll.db');

	$stmt = $db->prepare('SELECT * FROM Poll');
	$stmt->execute();
	while($row = $stmt->fetch()) {
		echo $row['CreatorID'] . "\n";
	}
		$stmt = $db->prepare('SELECT * FROM Question');
	$stmt->execute();
	while($row = $stmt->fetch()) {
		echo $row['QuestionText'] . "\n";
	}
?>