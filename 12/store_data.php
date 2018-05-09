<?php
require("vendor/autoload.php");

use Models\Classes\Marks;
use Models\Classes\Modules;
use Models\Classes\Students;


$mark_data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
$modu_data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
$stud_data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);


//pass data to classes contructors
if(isset($_POST['new_student'])){
    $student = new Students($stud_data);
    $student->save();
}elseif(isset($_POST['new_module'])){
    $module = new Modules($modu_data);
    $module->save();
}elseif(isset($_POST['new_mark'])){
    $mark = new Marks($mark_data);
    $mark->save();
}