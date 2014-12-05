<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Personal Page - POLL RAVAGER 3000</title>
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<h1><?php echo $_SESSION['name']?>'s page.</h1>
				<div class="right">
					<h2><a href="logout.php">Log out</a></h2>
				</div>
			</div>
			<div class="centered">
				<h2><a href="newpoll.html">Create poll</a><br></h2>
				<h2><a href="managepolls.php">Manage Poll</a></h2>
				<h2><a href="listpolls.php">Answer Polls</a></h2>
				</p>
			</div>
			
			<div style="clear: both;"> </div>
			<div id="footer">
				<p>LTW FEUP 2014/2015</p>
				<p>Miguel Mendes, Pedro Rocha</p>
		</div>
		</div>
	</body>
</html>
