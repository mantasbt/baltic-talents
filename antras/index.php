<!DOCTYPE HTML>
<html>
    <head>
        <title>Darbas Nr. 2</title>
    </head>
    <body>


<!-- Pirma užduotis -->
<?php

    function vardas($name){
        echo "<h1>$name</h1>";
    }

    vardas("Mantas");

?>


<!-- Antra užduotis -->
        <?php

        	$num1 = 7;
        	$num2 = 6;

        	if ($num1 > $num2) {
        		$trueOrFalse = 1;
        	}else{
        		$trueOrFalse = 0;
        	}


        	function check(String $string, $var){
        		if($var == True){
        			echo "<h1>Antraštė: $string</h1>";
        		}else{
        			echo "Paprastas tekstas: $string";
        		}
        	}
        	check("blabla", $trueOrFalse);

        ?>


<!-- Trečia užduotis -->
<?php

	
	
	$name = "Mantas";
	$sad = ":-(";
	$happy = ":-)";
	$unknown = ":-|";

	function determinate($condition){

	global $name;
	global $sad;
	global $happy;
	global $unknown;

		if ($condition == "sad") {
			echo "<p><h1>$name</h1> is $sad today!</p>";
		} elseif($condition == "happy"){
			echo "<p><h1>$name</h1> is $happy today!</p>";
		} else{
			echo "<p><h1>$name</h1> is feeling $unknown today!</p>";
		}
	}

	determinate("happy");

?>
    </body>
</html>
