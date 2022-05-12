<!DOCTYPE html>
<html>
	<head lang="en">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Righteous&display=swap" rel="stylesheet">


	<title>The smoke room</title>
	<link rel="stylesheet" href="css/styleStart.css">
	</head>
	<body>
		<div id="title">
			THE SMOKE ROOM
		</div>
	<div id="main">
		<form method="post" action="start.php">
				
		<div class="player">
						<h5>PLAYER 1:</h5>
						<input type="text" name="player1" placeholder="Tom" class="tex" required />
					</div>
					<div class="player">
						<h5>PLAYER 2:</h5>
						<input type="text" name="player2" placeholder="Tit" class="tex" required />
					</div>
					<div class="player">
						<h5>PLAYER 3:</h5>
						<input type="text" name="player3" placeholder="Tot" class="tex" required />
					</div>
				
				<div id="numdcthr">
					<label for="throws">ROUNDS:</label>
					<select name="Dice_throws" id="throws">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div id="start">
					<input type="submit" value="START" id="strt" />
				</div>
			
		</form>
	</div>
	</body>
</html>