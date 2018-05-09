<?php
namespace Models\Database;
use PDO;
use Exception;

abstract class Db
{
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DB = "learn";

    protected function getDb(){
        try{
            return new PDO('mysql:host=localhost;dbname=learn', 'root', '');
        }
        catch (Exception $e){
            //echo $e->getMessage();
            echo "Nepavyko prisijungti prie DB";
        }
    }

    protected function query($sql, $params = []){
        $sth = $this->getDb()->prepare($sql);
        $sth->execute($params);

        return $sth;

        // $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
