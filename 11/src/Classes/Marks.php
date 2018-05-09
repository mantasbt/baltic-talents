<?php

namespace Models\Classes;

use Models\Database\Db;
use PDO;

class Marks extends Db
{
	public $student_no;
	public $module_code;
	public $mark;

	public function __construct($data =[]){

		$this->getDb();

		// if(count($data) > 0):
			$this->student_no = $data['student_no'];
			$this->module_code = $data['module_code'];
			$this->mark = $data['mark'];
		// endif;
	}

	public function save(){
		$sql = "INSERT INTO marks (student_no, module_code, mark) VALUES (:student_no, :module_code, :mark)";

		$this->query($sql, [
			'student_no' => $this->student_no,
			'module_code' => $this->module_code,
			'mark' => $this->mark
		]);

		//check what happens when SQL started
		// $res->debugDumpParams();

	}

}
