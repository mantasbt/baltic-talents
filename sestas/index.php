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
    <legend>Registracija</legend>
    <label for='username' >Username*: </label>
    <input type="text" name="username">
    <label for='password' >Password*: </label>
    <input type="password" name="password">
    <label for='email' >Email*: </label>
    <input type="text" name="email">
    <label for='name' >Name*: </label>
    <input type="text" name="name">
    <input type="submit" value="Registruotis" name="register">
    </fieldset>
</form>


</body>
</html>
