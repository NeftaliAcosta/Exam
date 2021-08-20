<?php 

namespace App\Controllers;

use \PDO;

class connection{
	public $dbuser;
	public $dbpassword;
	public $dbname;
	public $dbhost;

	public function __construct(){
		$this->dbuser = 'root';
		$this->bdname = 'minisystem';
		$this->bdpw= '';
		$this->bdhost = 'localhost';
	}

	public function connect(){
		$dsn = "mysql:host=".$this->bdhost.";dbname=".$this->bdname.";charset=utf8";
		$usuario =  $this->dbuser;
		$password = $this->bdpw;
		try {
			$mbd = new PDO($dsn, $usuario, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'", PDO::ATTR_PERSISTENT => true));
			$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$mbd->exec('SET NAMES "utf8"');
		} catch (PDOException $e) {
			var_dump($e->getMessage());
		}
		return $mbd;
	}

	public function catchError($sql, $e){
		"La siguiente consulta: {$sql} ha ocasionado el siguiente error: {$e}";
	}

}