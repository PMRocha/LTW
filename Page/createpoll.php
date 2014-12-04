<?php
session_start();
	if(isset($_SESSION['name']) && $_SESSION['name'] != '') {
	
		$db = new PDO('sqlite:../DataBase/Poll.db');
		$db->beginTransaction();
	
		$cont = 0;
		foreach ($_POST as $i => $value) {
			if($cont >0){
				
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

			echo "<div id='wrap'><div id='header'>";
			echo "<h1>Poll Created Successfully\n</h1><br>";
			echo "<h2>\nRedirecting...</h2></div></div>";
			?>
			<link rel="stylesheet" type="text/css" href="style.css">
			<meta http-equiv="refresh" content="3;url=../Page/personal.php" />
			<?php
?>