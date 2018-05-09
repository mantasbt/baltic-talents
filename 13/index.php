<!doctype html>
<html lang="en">
  <head>
    <title>Web servisai – API, REST, SOAP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

<body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
<?php

for ($i=0; $i < 5; $i++) { 
    $url = "https://api.chucknorris.io/jokes/random";
    $results = json_decode(file_get_contents($url)); 
    $res[] = $results;
}
//var_dump($res);

abstract class Db
{
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DB = "chuck";

    protected function getDb(){
        try{
            return new PDO('mysql:host=localhost;dbname=chuck', 'root', '');
        }
        catch (Exception $e){
            echo "Nepavyko prisijungti prie DB";
            exit();
        }
    }

    protected function query($sql, $params = []){
        $sth = $this->getDb()->prepare($sql);
        $sth->execute($params);

        return $sth;

    }
}

class Chuck extends Db
{
    public $records;

    public function __construct($res =[]){
        $this->getDb();
        $this->records = $res;
    }

    public function save(){
        foreach($this->records as $record) {
            $pdo = $this->getDb();
            $sql = "SELECT * FROM records WHERE id = '$record->id'";
            $res = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);

            if($res){
                echo "Įrašas su id: " . $record->id . " jau yra, todėl jo įkėlimas nutrauktas.<br>";
                continue;
            }else{
                $sql = "INSERT INTO records (id, value, url, icon_url) VALUES (:id, :value, :url, :icon_url)";
                $this->query($sql, [
                    'id' => $record->id,
                    'value' => $record->value,
                    'url' => $record->url,
                    'icon_url' => $record->icon_url
                ]);
                echo "Įrašo su id: " . $record->id . " nebuvo, todėl jis buvo įkeltas :)<br>";
            }
        }

    }
    public function getRecords(){
        $sql = "SELECT * FROM records ORDER BY created_at DESC LIMIT 10";

        $res = $this->query($sql, [])->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

}

$chuck = new Chuck($res);
$chuck -> save();

?>


<div class="container mt-2">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <?php
            $record = new Chuck;

                
                    foreach($record->getRecords() as $record): ?>

                    <div class="card">
                        <div class="card-header">
                            <img src="<?php echo $record['icon_url'] ?>"><span style="float:right">ID: <?php echo $record['id'] ?></span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $record['value'] ?></h5>
                            <p class="card-text">Sukurta: <?php echo $record['created_at'] ?></p>
                            <a href="<?php echo $record['url'] ?>" target="_blank" class="btn btn-primary">Linkas</a>
                        </div>
                    </div>
                    <br><br>
                
                    <?php endforeach; ?>
                

        </div>

        <div class="col-md-3"></div>
    </div>
</div>



</body>
</html>
