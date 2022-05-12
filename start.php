<?php
			session_start();
			// error_reporting(E_ALL & ~E_NOTICE);
			
			$_SESSION['ime1']=$_POST['player1'];
			$_SESSION['ime2']=$_POST['player2'];
			$_SESSION['ime3']=$_POST['player3'];

			// $players = array($_SESSION['ime1'], $_SESSION['ime2'], $_SESSION['ime3']);

			$_SESSION['sum1']=0;
			$_SESSION['sum2']=0;
			$_SESSION['sum3']=0;
			$_SESSION['umRounds']=$_POST['Dice_throws'];
		?>

<!DOCTYPE html>
<html>
	<head lang="en">
	<link rel="stylesheet" href="css/style.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Righteous&display=swap" rel="stylesheet">

	
	<script src="js/jQuery.js"></script>
	<!-- <script src="js/game.js"></script> -->
	<script>
		$(function(){
			$("#throw").click(function(){
				$("#throw").attr("disabled","disabled");
				setTimeout(function(){
					$("#throw").removeAttr("disabled");
				}, 11000);
			});
		}
		
			);
	</script>
	
		<title>The smoke room</title>
	</head>
	<body>
	<div id="title">
			THE SMOKE ROOM
	</div>
	<!-- <div>
	<div class="bubble">!</div>
	<div class="pointer"></div>
	</div> -->
	<div id="thought" style="opacity: 0;">
		<div class="thoughts"><span id="SpanT"></span></div>
	</div>

	<div id="container">
		<div class="dice">
			<!-- <div class="animation">
				<img class="anim">
				<img class="anim">
				<img class="anim">
			</div> -->
			<div class="adice">
				<img id="dic1">
				<img id="dic2">
				<img id="dic3">
			</div>
			<div id="sum1" style="opacity: 1;"></div>
			<div id="playa1" style="opacity: 1;"><?php echo $_SESSION['ime1']?></div>
		</div>
			
		<div class="dice">
			<!-- <div class="animation">
				<img class="anim">
				<img id="anim2">
				<img id="anim3">
			</div> -->
			<div class="adice">
				<img id="dic4">
				<img id="dic5">
				<img id="dic6">
			</div>
			<div id="sum2" style="opacity: 1;"></div>
			<div id="playa2" style="opacity: 1;"><?php echo $_SESSION['ime2']?></div>
		</div>
			
		<div class="dice">
			<!-- <div class="animation"></div> -->
			<div class="adice">
				<img id="dic7">
				<img id="dic8">
				<img id="dic9">
			</div>
			<div id="sum3" style="opacity: 1;"></div>
			<div id="playa3" style="opacity: 1;"><?php echo $_SESSION['ime3']?></div>
		</div>
		
	</div>

		<div id="thdiv">
			<button value="THROW" id="throw" onclick="throwDice()">ROLL</button>
		</div>

		<script>
		var pl2;
		var pl3;
		var numRounds;
		numRounds = <?php echo json_encode($_POST['Dice_throws']); ?>;
		pl1 = <?php echo json_encode($_POST['player1']); ?>;
		pl2 = <?php echo json_encode($_POST['player2']); ?>;
		pl3 = <?php echo json_encode($_POST['player3']); ?>;

		
		var sum1=0;
		var tempsum1=0;
		var tempsum2=0;
		var tempsum3=0;
		var i=1;
		var a=0;
		var b=0;
		var c=0;
		var sum3=0;
		var sum2=0;
		var s=0
		var speed = 100;
		const plOne = ["Nice roll "+pl1+"! I bet your mom would be proud of that one!", "Wow! Looks like you're on a roll "+pl1+"! hehehe.", "Nice one "+pl1+", that was very impressive.", "And this round goes to, "+pl1+"!", "Wow, great job "+pl1+", I'm so impressed.", " Quite a splendid roll "+pl1+", i must say", "Looks like this is your round, "+pl1+".", "You win this round "+pl1+", congratulations!", "And the winner of this round is "+pl1+".", "A breathtaking roll by "+pl1+", good on you.", "And with an outstanding roll, "+pl1+" takes this round.", "And the winner this time is "+pl1+"."];
		const plTwo = ["Nice roll "+pl2+"! I bet your mom would be proud of that one!", "Wow! Looks like you're on a roll "+pl2+"! hehehe.", "Nice one "+pl2+", that was very impressive.", "And this round goes to, "+pl2+"!", "Wow, great job "+pl2+", I'm so impressed.", " Quite a splendid roll "+pl2+", i must say", "Looks like this is your round, "+pl2+".", "You win this round "+pl2+", congratulations!", "And the winner of this round is "+pl2+".", "A breathtaking roll by "+pl2+", good on you.", "And with an outstanding roll, "+pl2+" takes this round.", "And the winner this time is "+pl2+"."];
		const plThree = ["Nice roll "+pl3+"! I bet your mom would be proud of that one!", "Wow! Looks like you're on a roll "+pl3+"! hehehe.", "Nice one "+pl3+", that was very impressive.", "And this round goes to, "+pl3+"!", "Wow, great job "+pl3+", I'm so impressed.", " Quite a splendid roll "+pl3+", i must say", "Looks like this is your round, "+pl3+".", "You win this round "+pl3+", congratulations!", "And the winner of this round is "+pl3+".", "A breathtaking roll by "+pl3+", good on you.", "And with an outstanding roll, "+pl3+" takes this round.", "And the winner this time is "+pl3+"."];
		const threeTie = ["Woah a three-way tie! Now this is rare!", "Oh my a three-way tie!"];
		const tie = ["And it's a tie! How exciting!", "Ooooh how exhilirating, this round is tied!", "Woah this round is tied!", "And we have a tie!", "Looks like this round ends with a tie."];

		var txt="";


		function getText(){
			s=0;
			document.getElementById("SpanT").textContent += "";
			if(tempsum1==tempsum2 && tempsum2==tempsum3 && tempsum3==tempsum1)
			{
				txt = threeTie[Math.floor(Math.random()*threeTie.length)];
			}
			else if(tempsum1==tempsum2 && tempsum1>tempsum3 || tempsum1==tempsum3 && tempsum1>tempsum2 || tempsum2==tempsum3 && tempsum3>tempsum1)
			{
				txt = tie[Math.floor(Math.random()*tie.length)];
			}
			// else if(tempsum2==tempsum3 && tempsum3>tempsum1)
			// {
			// 	txt = tie[Math.floor(Math.random()*tie.length)];
			// }
			else if(tempsum1>tempsum2 && tempsum1>tempsum3)
			{
				txt = plOne[Math.floor(Math.random()*plOne.length)];
			}
			else if(tempsum2>tempsum1 && tempsum2>tempsum3)
			{
				txt = plTwo[Math.floor(Math.random()*plTwo.length)];
			}
			else if(tempsum3>tempsum1 && tempsum3>tempsum2)
			{
				txt = plThree[Math.floor(Math.random()*plThree.length)];
			}

			typeWriter();

			document.getElementById("thought").style.opacity = "1";
		}

		function typeWriter() {
			
    	if (s < txt.length) {
			document.getElementById("SpanT").textContent += txt.charAt(s);
    	s++;
    	setTimeout(typeWriter, speed);
  	}
  else 
  	{setTimeout(function(){
	  	document.getElementById("thought").style.opacity = "0";
	}, 1500);
	}

}


function throwDice(){
	document.getElementById("SpanT").textContent = "";
		document.getElementById("dic1").src="img/diceanim.gif";
		document.getElementById("dic2").src="img/diceanim.gif";
		document.getElementById("dic3").src="img/diceanim.gif";

		document.getElementById("dic4").src="img/diceanim.gif";
		document.getElementById("dic5").src="img/diceanim.gif";
		document.getElementById("dic6").src="img/diceanim.gif";

		document.getElementById("dic7").src="img/diceanim.gif";
		document.getElementById("dic8").src="img/diceanim.gif";
		document.getElementById("dic9").src="img/diceanim.gif";

		

	setTimeout(function(){
		a=Math.floor(Math.random() * 6) + 1;
		b=Math.floor(Math.random() * 6) + 1;
		c=Math.floor(Math.random() * 6) + 1;

		document.getElementById("dic1").src="img/dice" + a +".gif";
		document.getElementById("dic2").src="img/dice" + b +".gif";
		document.getElementById("dic3").src="img/dice" + c +".gif";

		sum1=sum1+a+b+c;
		tempsum1=a+b+c;
		document.getElementById("sum1").innerHTML = "SCORE:" + tempsum1;

		a=Math.floor(Math.random() * 6) + 1;
		b=Math.floor(Math.random() * 6) + 1;
		c=Math.floor(Math.random() * 6) + 1;

		document.getElementById("dic4").src="img/dice" + a +".gif";
		document.getElementById("dic5").src="img/dice" + b +".gif";
		document.getElementById("dic6").src="img/dice" + c +".gif";

		sum2=sum2+a+b+c;
		tempsum2=a+b+c;
		document.getElementById("sum2").innerHTML = "SCORE:" + tempsum2;

		a=Math.floor(Math.random() * 6) + 1;
		b=Math.floor(Math.random() * 6) + 1;
		c=Math.floor(Math.random() * 6) + 1;

		document.getElementById("dic7").src="img/dice" + a +".gif";
		document.getElementById("dic8").src="img/dice" + b +".gif";
		document.getElementById("dic9").src="img/dice" + c +".gif";

		sum3=sum3+a+b+c;
		tempsum3=a+b+c;
		document.getElementById("sum3").innerHTML = "SCORE:" + tempsum3;

		console.log(sum1);
		console.log(sum2);
		console.log(sum3);
		
		document.cookie = escape('sum1') + "=" + escape(sum1) + "; path=/";
		document.cookie = escape('sum2') + "=" + escape(sum2) + "; path=/";
		document.cookie = escape('sum3') + "=" + escape(sum3) + "; path=/";

		i=i+1;

		getText();
		
		

	},4000);

		if (i==numRounds){
		

			setTimeout(function(){
				window.location.href = "end.php";
			}, 11000);
			
		}
}


	</script>
	</body>
</html>