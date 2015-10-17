<?php require_once("conection.php");
class Api{
	//$obj = new Conection("mysql","localhost","root","","galileosupermercado");
	private $db1; //
	private $data;
	private $result;
	private $json;
	public function __construct(){// this construct must recipe the database function
		$this->db1 = new Conection("mysql","localhost","root","","galileosupermercado");
	}
	public function querySend($table , $cols, $parameters){
		$this->data = $this->db1->select($table , $cols, $parameters);
		//print_r($this->data);
		foreach ($this->data as $row){
			$this->result[] = $row;
			
		} 
		
	}
	public function convertJson(){//this method will convert data in json
		$this->json = json_encode($this->result);
	}
	public function printJson(){
		echo $this->json;	
		
	}
}
/*way to use*/
$obj = new Api("mysql","localhost","root","","galileosupermercado");
//echo "<br />conecta";
$obj->querySend("usuario","usuario,pass","usuario='irunga1'");
//echo "<br />query";
$obj->convertJson();
//echo "<br />json generado<br />";
$obj->printJson();

?>