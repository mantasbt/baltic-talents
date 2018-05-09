<?php
require("vendor/autoload.php");

use Models\Classes\Marks;
use Models\Classes\Modules;
use Models\Classes\Students;


$data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);


//pass data to class Marks contructor
// $mark = new Marks($data);
$mark = new Marks("9", "9", "9");
$mark->save();

$module = new Modules($data);
$module->save();

$student = new Students($data);
$student->save();



