<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>#7. Darbas su duomenų bazėmis – ryšiai tarp lentelių, JOIN, filtrai, sąlygos, paieška.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<!-- POST IDEJIMAS -->
<form action="" method="POST" style="width: 10%;">
    <fieldset>
    <legend style="text-align: center;">Posto įkėlimas pagal autorių</legend>
    <label for='author' >Autorius:</label>
    <select name="author" id="" style="width: 100%;">
    <option value="1">Mantas</option>
    <option value="2">Petras</option>
    <option value="3">Jonas</option>
</select>
    <label for='title' >Pavadinimas:</label>
    <input type="text" name="title">
    <label for='content' >Turinys:</label>
    <textarea name="content" style="width: 96%;"></textarea>
    <input type="submit" value="Paskelbti" name="save_post" style="margin-top: 15px; float: right;">

    </fieldset>
</form>

<?php

    if(isset($_POST['save_post'])):
        $parent_id = $_POST['author'];
        $post_data = array();
        $post_data['title'] = $_POST['title'];
        $post_data['content'] = $_POST['content'];
        storeCategories(['title' => $post_data['title'],'content' => $post_data['content'],'parent_id' => $parent_id]);
        unset($post_data);
        echo "Postas sėkmingai įkeltas";
    endif;    
?>

<?php
function storeCategories($post_data){
    $sql = "INSERT INTO posts (title, content, parent_id) VALUES (:title, :content, :parent_id)";    
    $sth = getDb()->prepare($sql);
    $sth->execute([
        "title" => $post_data['title'],
        "content" => $post_data['content'],
        "parent_id" => $post_data['parent_id']
    ]);
    return $sth->rowCount();
}
function getDb(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "mydatabase";
    $dsn = "mysql:host=$host;dbname=$db";
    return new PDO($dsn, $user, $password);
}
?>



<!-- ISVEDIMAS -->
<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "mydatabase";
$dsn = "mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn, $user, $password);

$sql = "
SELECT 
a.name as author_name, 
a.lastname as author_lastname,
p.title as post_title,
p.content as post_content
FROM authors a
LEFT JOIN posts p
    ON a.id = p.parent_id
";

$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<br><br>
<h1>Info iš duomenų bazės</h1>
 <table>
        <th>Author name</th>
        <th>Author lastname</th>
        <th>Post title</th>
        <th>Post content</th>
    <?php foreach($data as $cat): ?>

            <tr>
                <td><?php echo $cat['author_name'] ?></td>
                <td><?php echo $cat['author_lastname'] ?></td>
                <td><?php echo $cat['post_title'] ?></td>
                <td><?php echo $cat['post_content'] ?></td>
            </tr>

    <?php endforeach ?>
</table>




</body>
</html>
