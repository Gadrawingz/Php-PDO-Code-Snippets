<?php
include ('connection.php');

class Query{

	public $link;
	public function __construct(){
		$ob = new DbConnection;
		$this->link= $ob->connection();
	}

	//  CODE ZO KU-INSERTINGA
	public function registerEmployee($Fname, $Lname, $Wage, $Years){
		$sql= "INSERT INTO Employee VALUES (null, '".$Fname."', '".$Lname."', 
		'".$Wage."', '".$Years."')";

		$query= $this->link->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;
	}

    public function viewAllEmployees(){
		$query= $this->link->prepare("SELECT * FROM Employee");
		$query->execute();
		return $query;
	}

	// KODE ZO KUDISPLAYINGA EMPLOYEES BARI HEJURU YIMYAKA 2
    public function viewEmployeesOver2years(){
		$query=$this->link->prepare("SELECT * FROM Employee WHERE yearsWithInstitution>=2");
		$query->execute();
		return $query;
	}

	// KODE ZO GUSIBA
	public function deleteEmployee($ID){
		$query= $this->link->prepare("DELETE FROM Employee WHERE ID ='".$ID."' ");
		$query->execute();
		$count= $query->rowCount();
		return $count;
	}
}

?>