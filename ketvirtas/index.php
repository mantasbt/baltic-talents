<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Darbas Nr. 4</title>
</head>
<body>

<h1 style="text-decoration: underline;">Pirma ir antra dalys kartu</h1>
<br>

<form action="user.php" method="POST">
    <input type="text" name="user">
    <input type="password" name="password">
    <input type="submit" name="login" value="Prisijungti">
</form>

<?php


    if (!empty($_SESSION['name'])) {
        echo "<br/>";
        echo "<p style='color:green;'>Welcome back, " . $_SESSION['name'] . "!" . "</p>";
        unset($_SESSION['name']);
        exit;
    }else{
        echo "<br/>";
        echo "<p style='color:grey;'>Prisijungti gali tik admin su savo slaptažodžiu :)</p>";
    }

?>

</body>
</html>
