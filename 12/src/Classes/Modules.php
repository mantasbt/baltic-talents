<?php

namespace Models\Classes;

use Models\Database\Db;
use PDO;

class Modules extends Db
{
	public $module_code;
	public $module_name;

	public function __construct($modu_data =[]){

		$this->getDb();

		if(isset($_POST['new_module'])):
			$this->module_code = $modu_data['module_code'];
			$this->module_name = $modu_data['module_name'];
		else: echo "nepaduoti duomenys";
		endif;
	}

	public function save(){
		$sql = "INSERT INTO modules (module_code, module_name) VALUES (:module_code, :module_name)";

		$this->query($sql, [
			'module_code' => $this->module_code,
			'module_name' => $this->module_name,
		]);

	}

}
