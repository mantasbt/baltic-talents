<?php 
session_start();

$user = array(
		'username' => "admin",
		'password' => "admin123"
	);
$name = $_POST['user'];
$pass = $_POST['password'];

if(isset($_POST['login'])){
	if(checkUser($user, $name, $pass)){
		$_SESSION['name'] = $_POST['user'];
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
}


function checkUser($user, $username, $password){

	if($user['username'] == $_POST['user'] && $user['password'] == $_POST['password']){
        return true;
	}else{
        return false;  
	}
}

?>