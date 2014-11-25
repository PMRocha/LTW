<?php
session_start();
	if(isset($_SESSION['name']) && $_SESSION['name'] != '') {
		$db = new PDO('sqlite:../DataBase/Poll.db');

		$db->beginTransaction();
		//store poll
		$stmt = $db->prepare('INSERT INTO Poll(CreatorID) VALUES (?)');
		$stmt->execute(array($_SESSION['userID']));
		//store question poll relation
		$stmt = $db->prepare('INSERT INTO Question(QuestionText,QuestionPoll)
							SELECT  ?, PollID
							FROM    Poll 
							ORDER BY PollID DESC LIMIT 1');
		$stmt->execute(array($_POST['question']));
		//store answer 1
		$stmt = $db->prepare('INSERT INTO Answer(AnswerOption,AnswerToQuestion)
							SELECT  ?, QuestionID
							FROM    Question 
							ORDER BY QuestionID DESC LIMIT 1');
		$stmt->execute(array($_POST['answer1']));
		//store answer 1?
		$stmt = $db->prepare('INSERT INTO AnswerResult(AnswerResults,ResultCont)
							SELECT   AnswerID, 0
							FROM    Answer 
							ORDER BY AnswerID DESC LIMIT 1');
		$stmt->execute();
		//store answer 2
		$stmt = $db->prepare('INSERT INTO Answer(AnswerOption,AnswerToQuestion)
							SELECT  ?, QuestionID
							FROM    Question 
							ORDER BY QuestionID DESC LIMIT 1');
		$stmt->execute(array($_POST['answer2']));
		//store answer 2?
		$stmt = $db->prepare('INSERT INTO AnswerResult(AnswerResults,ResultCont)
							SELECT   AnswerID, 0
							FROM    Answer 
							ORDER BY AnswerID DESC LIMIT 1');
		$stmt->execute();

		$db->commit();
	}

	$db = new PDO('sqlite:../DataBase/Poll.db');

	//delete everything
	$stmt = $db->prepare('DELETE FROM Poll');
	$stmt->execute();
	$stmt = $db->prepare('SELECT * FROM Poll');
	$stmt->execute();
	while($row = $stmt->fetch()) {
		echo $row['CreatorID'] . "\n";
	}
?>