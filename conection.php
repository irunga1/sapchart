<?php 
	class Conection{//class name
		private $db;
		private $query; //propertie
		public function __construct($motor,$server,$user,$pass,$dbname){
			$this->db = new PDO("$motor:dbname=$dbname;host=$server","$user","$pass");
			
		}
		public function select($table , $cols, $parameters){
			$length = strlen($parameters);
			$this->query  = "select ";
			if(strlen($cols)== 0 ){
				$this->query  = "select "."*";
			}
			else{
				$this->query  = "select ".$cols;
			}
			$this->query.=" from ".$table;			
			if(strlen($parameters)> 0 ){
				$this->query.=" where  ".$parameters;
			}			
			$data =  $this->db->query($this->query);	
			return $data;
			/*$data =  $this->db->prepare($this->query);
			$data->execute(); */
			//way to use
 			/* foreach($data as $row){
				echo $row[1] . '<br/>';
			}  */
		}		
		public function insert($table,$cols,$parameters){
			$this->query = "INSERT INTO ".$table."(".$cols.") values(".$parameters.")";			
			$this->db->query($this->query);
			
		}
		
		public function update($table,$cols,$parameters,$where){
			$this->query = "UPDATE ".$table. "SET".$parameters."WHERE".$where;			
			$this->db->query($this->query);
			
		}                          
		
		public function delete($table,$parameters){
			$this->query = "DELETE FROM ".$table." WHERE ".$parameters;
			echo $this->query;
			$this->db->query($this->query);
		}
	}	
	/*Way to use*/
	$obj = new Conection("mysql","localhost","root","","galileosupermercado");
	$data = $obj->select("usuario", "usuario,pass", "usuario='irunga1' and pass='holahola'" );
	foreach ($data as $row){
		//echo $row[0];
	} 
	//$obj->insert("usuario","usuario,email,pass" ,"'irunga4','loquesea2@gmail.com','holahola'" );*/
	
?>