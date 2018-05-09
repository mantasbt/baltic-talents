<?php
class ShoppingCart
{
	private $items = array();
	private $date;

	public function addItem(ShoppingCartItem $item){
		$this->items = $item;
	}
	public function getItems(){
		return $this->items;
	}
}
class ShoppingCartItem
{
	public $id;
	public $price;
	public $quantity;
	public $name;
}

$cart = new ShoppingCart;

$item = new ShoppingCartItem;
$item->name = "Tarchunas";
$item->price = 1.5;
$item->quantity = 1;
$item->id = 1;
//$item gali būti tik ShoppingCartItem klasės objektas
//$item negali būti paprastas kintamasis
$cart->addItem($item);
echo "<h1>Pirma dalis</h1>";
echo "<pre>";
var_dump($cart->getItems());
echo "</pre>";

echo "<br><br>";
echo "<h1>Antra dalis</h1>";


class Drink
{
	protected $name = null;

	protected function setDrinkName($name){
		$this->name = $name;
	}
	public function getDrinkName(){
		return $this->name;
	}
}

class Coffee extends Drink
{
	function __construct(){
    	$this->name = __CLASS__;
  	}
}

$coffee = new Coffee;
echo "My new drink is: ".$coffee->getDrinkName();
