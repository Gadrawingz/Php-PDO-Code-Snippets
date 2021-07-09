<?php
class DbConnection{
	public $host="localhost";
	protected $database= "EmployeeSystemName";
	private   $user="root";
	private   $pass="";
	public    $con;
	
	public function connection(){

		try{
		$dsn= "mysql:host=$this->host; dbname=$this->database";
		$this->con = new PDO($dsn, $this->user, $this->pass );
		return $this->con;

	}catch(PDOException $err ){
		echo "ERROR OCCURED".$err->getMessage();

	}
  }
}