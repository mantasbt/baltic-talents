<?php
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


class Marks extends Db
{
    public $student_no;
    public $module_code;
    public $mark;

    public function __construct($student_no, $module_code, $mark){

        $this->getDb();

        $this->student_no = $student_no;
        $this->module_code = $module_code;
        $this->mark = $mark;
    }

    public function save(){
        $sql = "INSERT INTO marks (student_no, module_code, mark) VALUES (:student_no, :module_code, :mark)";

        $this->query($sql, [
            'student_no' => $this->student_no,
            'module_code' => $this->module_code,
            'mark' => $this->mark
        ]);
        echo __CLASS__ . " data is imported!<br>";

    }

}

$newmark = new Marks('20060102', 'CM0004', '777');
$newmark->save();

class Students extends Db
{
    public $student_no;
    public $surname;
    public $forename;

    public function __construct($student_no, $surname, $forename){

        $this->getDb();

        $this->student_no = $student_no;
        $this->surname = $surname;
        $this->forename = $forename;
    }

    public function save(){
        $sql = "INSERT INTO Students (student_no, surname, forename) VALUES (:student_no, :surname, :forename)";

        $this->query($sql, [
            'student_no' => $this->student_no,
            'surname' => $this->surname,
            'forename' => $this->forename
        ]);
        echo __CLASS__ . " data is imported!<br>";

    }

}

$newstudent = new Students('20060106', 'Mantas', 'Jakavonis');
$newstudent->save();

class Modules extends Db
{
    public $module_code;
    public $module_name;

    public function __construct($module_code, $module_name){

        $this->getDb();

        $this->module_code = $module_code;
        $this->module_name = $module_name;
    }

    public function save(){
        $sql = "INSERT INTO modules (module_code, module_name) VALUES (:module_code, :module_name)";

        $this->query($sql, [
            'module_code' => $this->module_code,
            'module_name' => $this->module_name
        ]);
        echo __CLASS__ . " data is imported!<br>";

    }

}

$newmodule = new Modules('CM0002', 'PHP');
$newmodule->save();
