<!DOCTYPE HTML>
<head></head>
<body>


<!-- Pirmas -->
<?php 
echo "<h1>Pirmas</h1>";
$months = array("Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis");

    echo "<table>";
	echo "<ol>";
		foreach ($months as $month) {
  			echo "<li>" . $month . "</li>";
		}
	echo "</ol>";
	echo "</table>";
    	
?>


<!-- Antras -->
<?php

echo "<h1>Antras</h1>";

   $shopping_cart = [
       [
           'type' => 'vegetables',
           'name' => 'potato',
           'quantity' => '10',
           'price' => '1.0'
       ],
       [
           'type' => 'vegetables',
           'name' => 'onion',
           'quantity' => '5',
           'price' => '0.5'
       ],
       [
           'type' => 'vegetables',
           'name' => 'cucumber',
           'quantity' => '2',
           'price' => '1.2'
       ],
        [
           'type' => 'fruits',
           'name' => 'banana',
           'quantity' => '2',
           'price' => '1.0'
        ],
        [
           'type' => 'fruits',
           'name' => 'apple',
           'quantity' => '3',
           'price' => '1.2'
        ]
   ];

	foreach ($shopping_cart as $cart) {
		$price = $cart['quantity'] * $cart['price'];

		if($cart['type'] == 'fruits')
		echo "Vaisius yra: " . $cart['name'] . ", o jo kaina - " . $price . "<br />";
	}

?>

<!-- Trečias -->
<?php
echo "<h1>Trečias</h1>";


	function lastElement(array $values){
		if($values == null){
			echo "Array is empty";
		} else{
			echo end($values);
		}
	}
	echo "<h3>Kai array = numbers</h3>";
	echo lastElement(array(1,2,5,4,8,9,6));
	echo "<br>";
	echo "<h3>Kai array = string</h3>";
	echo lastElement(array("Mantas", "Petras", "Tomas"));
	echo "<br>";
	echo "<h3>Kai array = tuščias</h3>";
	echo lastElement(array());


?>

</body>
