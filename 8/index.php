<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>#8.Saugumo pagrindai, duomenų filtracija, klaidų valdymas.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
function getDb(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "learn";
    $dsn = "mysql:host=$host;dbname=$db";
    return new PDO($dsn, $user, $password);
}
?>

<!-- PAIESKA -->
<form action="" method="get" style="width: 10%;">
    <fieldset>
    <legend style="text-align: center;">Paieška</legend>
    <label for='forename' >Forename:</label>
    <input type="text" name="forename">
    <label for='surname' >Surname:</label>
    <input type="text" name="surname">
    <label for='module_name' >Module_name:</label>
    <input type="text" name="module_name">
    <input type="submit" value="Search" style="margin-top: 15px; float: right;">
    </fieldset>
</form>


<?php

if(isset($_GET['forename']) && isset($_GET['surname']) && isset($_GET['module_name'])):
    $forename = $_GET['forename'];
    $surname = $_GET['surname'];
    $module_name = $_GET['module_name'];
	$sql = "
	SELECT modules.module_name as module_name, students.forename as forename, students.surname as surname
	FROM marks
	LEFT JOIN modules ON marks.module_code = modules.module_code
	LEFT JOIN students ON marks.student_no = students.student_no
	WHERE forename LIKE :forename AND surname LIKE :surname AND module_name LIKE :module_name
	";

    $sth = getDb()->prepare($sql);
    $sth->execute([
        'forename' => "%".$forename."%",
        'surname' => "%".$surname."%",
        'module_name' => "%".$module_name."%",
    ]);
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);

    if(count($res) > 0): ?>
        <h1>Rezultatas</h1>
		 <table>
		        <th>Forename</th>
		        <th>Surname</th>
		        <th>Module_name</th>
		    <?php foreach($res as $cat): ?>

		            <tr>
		                <td><?php echo $cat['forename'] ?></td>
		                <td><?php echo $cat['surname'] ?></td>
		                <td><?php echo $cat['module_name'] ?></td>
		            </tr>

		    <?php endforeach ?>
		</table>

	<?php else: ?>
			<p>No results were found</p>

    <?php endif; ?> 


<?php endif; ?>


<!-- ISVEDIMAS -->
<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "learn";
$dsn = "mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn, $user, $password);

$sql = "SELECT marks.mark as mark, modules.module_name as module_name, students.forename as forename, students.surname as surname\n"

    . "FROM ((marks\n"

    . "LEFT JOIN modules ON marks.module_code = modules.module_code)\n"

    . "LEFT JOIN students ON marks.student_no = students.student_no)";


$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<br><br>
<h1>Info iš duomenų bazės</h1>
 <table>
        <th>Mark</th>
        <th>Module name</th>
        <th>Forename</th>
        <th>Surname</th>
    <?php foreach($data as $cat): ?>

            <tr>
                <td><?php echo $cat['mark'] ?></td>
                <td><?php echo $cat['module_name'] ?></td>
                <td><?php echo $cat['forename'] ?></td>
                <td><?php echo $cat['surname'] ?></td>
            </tr>

    <?php endforeach ?>
</table>




</body>
</html>
