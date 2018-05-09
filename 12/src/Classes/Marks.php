<?php

namespace Models\Classes;

use Models\Database\Db;
use PDO;

class Marks extends Db
{
	public $student_no;
	public $module_code;
	public $mark;

	public function __construct($mark_data =[]){

		$this->getDb();

		if(isset($_POST['new_mark'])):
			$this->student_no = $mark_data['student_no'];
			$this->module_code = $mark_data['module_code'];
			$this->mark = $mark_data['mark'];
		endif;
	}

	public function save(){
		$sql = "INSERT INTO marks (student_no, module_code, mark) VALUES (:student_no, :module_code, :mark)";

		$this->query($sql, [
			'student_no' => $this->student_no,
			'module_code' => $this->module_code,
			'mark' => $this->mark
		]);

	}

}
