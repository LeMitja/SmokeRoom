<?php
    session_start();
            $_SESSION["sum1"] = $_COOKIE["sum1"];
			$_SESSION["sum2"] = $_COOKIE["sum2"];
			$_SESSION["sum3"] = $_COOKIE["sum3"];


            $sum1 = $_SESSION['sum1'];
            $sum2 = $_SESSION['sum2'];
            $sum3 = $_SESSION['sum3'];

            $pl1 = $_SESSION['ime1'];
            $pl2 = $_SESSION['ime2'];
            $pl3 = $_SESSION['ime3'];
    
    function swap(&$x, &$y) {
      
        $tmp=$x;
        $x=$y;
        $y=$tmp;
    }

    
    if ($sum1 < $sum3){
    swap($sum1, $sum3);
    swap($pl1, $pl3);
    }
    if ($sum1 < $sum2){
    swap($sum1, $sum2);
    swap($pl1, $pl2);
    }
    //Now the largest element is the 1st one. Just check the 2nd and 3rd

    if ($sum2 < $sum3){
    swap($sum2, $sum3);
    swap($pl2, $pl3);
    }


?>

<!DOCTYPE html>
<html>
	<head lang="en">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Righteous&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styleEnd.css">
    <title>The smoke room</title>
	</head>
	<body>
    <div id="title">
			THE SMOKE ROOM
	</div>
    <div id="thought" style="opacity: 1;">
		<div class="thoughts"><span id="SpanT"></span></div>
	</div>
    <script>
        pl1 = <?php echo json_encode($pl1); ?>;
		pl2 = <?php echo json_encode($pl2); ?>;
		pl3 = <?php echo json_encode($pl3); ?>;

        sum1 = <?php echo json_encode($sum1); ?>;
		sum2 = <?php echo json_encode($sum2); ?>;
		sum3 = <?php echo json_encode($sum3); ?>;

        var txt="";
        const noTie = ["Congratulations "+pl1+"! You are tonights winner with "+sum1+" points! "+pl2+" is second with "+sum2+" points, and "+pl3+" you only got "+sum3+" points which makes you place last.", "Looks like it was your night tonight "+pl1+". You won with "+sum1+" points. "+pl2+" came in second with "+sum2+" points and "+pl3+" in third with "+sum3+" points.", "And tonights lucky winner is "+pl1+" who got "+sum1+" points! Congratulations! "+pl2+" came in second with "+sum2+" points and "+pl3+" is third only collecting "+sum3+" points. Better luck next time!", "A round of applause for "+pl1+" who won with "+sum1+" points. In second place we have "+pl2+", who collected "+sum2+" points and in last place is "+pl3+" with "+sum3+" points."];
        const threeTie = ["Eerybody wins tonight with "+sum1+" points!", "Wow amazing! looks like everyone is tied with a score of "+sum1+"!"];

        const twoTie = ["Looks like "+pl1+" and "+pl2+" are tied with "+sum1+" points so the only looser is "+pl3+" with only "+sum3+" points.", "And tonights match ends with a tie between "+pl1+" and "+pl2+" who both have a score of "+sum1+". "+pl3+" is in last with a score of "+sum3];

        const twTie = ["And the victor is "+pl1+" with a score of "+sum1+". "+pl2+" and "+pl3+" are tied for last place with a score of "+sum3];

        var s=0
		var speed = 80;
        getText();

        function getText(){
			s=0;
			document.getElementById("SpanT").textContent += "";

			if(sum1!=sum2 && sum2!=sum3 && sum1!=sum3)
			{
				txt = noTie[Math.floor(Math.random()*noTie.length)];
			}
            else if(sum1==sum2)
            {
                txt = twoTie[Math.floor(Math.random()*twoTie.length)];
            }
            else if(sum3==sum2)
            {
                txt = twTie[Math.floor(Math.random()*twTie.length)];
            }
            else if (sum1==sum2 && sum2==sum3)
            {
                txt = threeTie[Math.floor(Math.random()*threeTie.length)];
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
            {
              setTimeout(function(){
              document.getElementById("thought").style.opacity = "0";
            }, 2000);

            setTimeout(function(){
                window.location.href = "index.php";
            }, 2900);
        }
    
    }
    </script>
	</body>
</html>