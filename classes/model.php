<?php

abstract class Model{
	protected $dbh;
	protected $stmt;

	public function __construct(){
		//$this->dbh = new PDO("pgsql:host=localhost;port=5432;dbname=ordem_db;user=postgres;password=123");
		$this->dbh = new PDO("pgsql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";user=".DB_USER.";password=".DB_PASS);		
	}

	public function query($query=''){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function run($query=''){
		$stmt = $this->dbh->prepare($query); 
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function runAndGetId($query=''){
		$this->dbh->query($query);
		$id = $this->lastInsertId();
		return $id;		
	}

	public function run2($query=''){
		$stmt = $this->dbh->prepare($query); 
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function runReturnRow($query=''){
		$rows = $this->dbh->prepare($query);
		$rows->execute();
		return $rows->rowCount();;
	}

	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		$this->stmt->execute();
	}

	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function countSet(){
		$this->execute();
		return $this->stmt->fetchColumn();
	}

	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}
}

?>