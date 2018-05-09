<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php


class Post
{
	const MAX_LENGTH = 500;
	private $title;
	private $content;
	private $author;
	
	public function setTitle($title){
		$this->title = $title;
	}
	public function getTitle(){
		return $this->title;
	}
	public function setContent($content){
		if (strlen($content) > Post::MAX_LENGTH) {
			echo "Max content length is: " . Post::MAX_LENGTH;
		}else{
			$this->content = $content;
		}
	}
	public function getContent(){
		 return $this->content;
	}
	public function setAuthor(Person $author){
		$this->author = $author;
	}
	public function getAuthor(){
		return $this->author;
	}
}

class Person
{
	private $name;
	private $id;

	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
}

$person = new Person();
$person->setName("John");
$person->setId(10);

$post = new Post();
$post->setTitle("My titile");
$post->setContent("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s");
$post->setAuthor($person);

echo $person->getName();
echo "<br>";
echo $person->getiD();
echo "<br><br>";
echo $post->getTitle();
echo "<br>";
echo $post->getContent();
echo "<br><br>";
echo "<pre>";
var_dump($post->getAuthor());
echo "</pre>";

?>


</body>
</html>
