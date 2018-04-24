<?php session_start(); ?>
<?php

$host = "localhost";
$user = "root";
$dbpassword = "";
$db = "maindb";

$dsn = "mysql:host=$host;dbname=$db";

$pdo = new PDO($dsn, $user, $dbpassword);


function insertUsers($db){
    $sql = "INSERT INTO users (username, password, email, name) VALUES (:username, :password, :email, :name)";

    $sth = $db->prepare($sql);

    $sth->bindParam(':username', $username);
    $sth->bindParam(':password', $password);
    $sth->bindParam(':email', $email);
    $sth->bindParam(':name', $name);

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    $sth->execute();

    if(isset($_POST['register'])){
        $_SESSION['success'] = "Registracija sėkminga!";
        header('Location: login.php');
    }else{
            echo "Error";
    }
    

}

insertUsers($pdo);
