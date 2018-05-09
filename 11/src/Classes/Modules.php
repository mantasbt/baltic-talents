<?php

namespace Models\Classes;

use Models\Database\Db;
use PDO;

class Modules extends Db
{
	public $module_code;
	public $module_name;

	public function __construct($data =[]){

		$this->getDb();

		// if(count($data) > 0):
			$this->module_code = $data['module_code'];
			$this->module_name = $data['module_name'];
		// endif;
	}

	public function save(){
		$sql = "INSERT INTO modules (module_code, module_name) VALUES (:module_code, :module_name)";

		$this->query($sql, [
			'module_code' => $this->module_code,
			'module_name' => $this->module_name,
		]);

		//check what happens when SQL started
		// $res->debugDumpParams();

	}

}