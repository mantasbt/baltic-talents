<?php

namespace Models\Classes;

use Models\Database\Db;
use PDO;

class Students extends Db
{
	public $student_no;
	public $surname;
	public $forename;

	public function __construct($data =[]){

		$this->getDb();

		// if(count($data) > 0):
			$this->student_no = $data['student_no'];
			$this->surname = $data['surname'];
			$this->forename = $data['forename'];
		// endif;
	}

	public function save(){
		$sql = "INSERT INTO students (student_no, surname, forename) VALUES (:student_no, :surname, :forename)";

		$this->query($sql, [
			'student_no' => $this->student_no,
			'surname' => $this->surname,
			'forename' => $this->forename
		]);

		//check what happens when SQL started
		// $res->debugDumpParams();

	}

}