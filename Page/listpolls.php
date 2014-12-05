<?php
	$db = new PDO('sqlite:../DataBase/Poll.db');
	$stmt = $db->prepare('SELECT * FROM Question');

	$stmt->execute();
	?>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>List Polls - POLL RAVAGER 3000</title>
	</head>
	<div id="wrap">
		<div id="header">
			<h1>POLL RAVAGER 3000</h1>
			<br>
			<h2>Available polls:</h2> 
	</div>
	<div class="centered">
	<?php
	while($row = $stmt->fetch()) {
		?>
			<a href="poll.php?pollID=<?=$row['QuestionPoll']?>"><h2> -> <?=$row['QuestionText']?></h2></a><p></p>
			
		<?php
	}
?>
	</div>
	<div style="clear: both;"> </div>
	<div id="footer">
		<p>LTW FEUP 2014/2015</p>
		<p>Miguel Mendes, Pedro Rocha</p>
	</div>
</div>