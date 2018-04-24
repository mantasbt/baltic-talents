<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Darbas su duomenų bazėmis – MySQL</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    
<form action="register.php" method="POST">
    <fieldset>
    <legend>Prisijungimas</legend>
    <label for='username' >Username*: </label>
    <input type="text" name="username">
    <label for='password' >Password*: </label>
    <input type="password" name="password">
    <input type="submit" value="Prisijungti" name="login">

    </fieldset>
</form>

<?php

if (!empty($_SESSION['success'])) {
    echo "<br/>";
    echo "<p style='color:green;'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
    exit;
}else{
    exit;
}

?>

</body>
</html>