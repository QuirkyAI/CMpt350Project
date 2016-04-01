<?php 
require_once('model/Connection.php');
require_once('model/Wine.php');

class Wine_Controller{
	private $dbInstance;
	private $sql;
	private $numberRows=0 ;
	private $set;
	private $table;
	private $key;

	public function getNumberRows(){
		return $this->numberRows;
	}
	public function getKey(){
		return $this->key;
	}
	public function getDbInstance(){
		return $this->dbInstance;
	}


	function setParameters($routes){
		// Retrieving the table and key from the path
		$this->table = $routes[0];
		$this->key = $routes[1];

}
function setAlterQuery($input){
		//Transforming the json $input (the parameters) int a key value
		$columns = array_keys($input);

		//Reading the global variable $dbInstance
		$connection=$this->dbInstance;

		/*
		function ($value) use ($connection) {  is an Anonymous Function or closure
		Ref: http://php.net/manual/en/functions.anonymous.php

		The anonymous function receives the parameter $value 
		The anonymous function uses the external variable $connection	
		The anonymous function will be applied to each element of the array

		The array_map() function sends each value of an array to an anonymous function, and returns an array with new values
		*/
	    $values = array_map(function ($value) use ($connection) {
	      if ($value===null) return null;
	      return (string)$value;
	    },array_values($input));

		/*
		Building the SET part of the SQL command
		*/
	    for ($i=0; $i<count($columns); $i++) {
	      $this->set.=($i>0?',':'').'`'.$columns[$i].'`=';
	      $this->set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
	    }
	}
	/*
	Getting the SQL query depending on the requested method
	*/
	function setQuery($method,$input){
		switch ($method) {
			case 'GET':
	          	if(isset($this->key)){
					return json_encode($this->find($this->key));
				}else{
					return json_encode($this->readAll());
				}
          		break;
          	case 'PUT':
          		$this->setAlterQuery($input);
          		$updated_rows=$this->update();
          		if($updated_rows>0){return json_encode($this->find($this->key));}
          		return $updated_rows;
            	break;
          	case 'POST':
          		$this->setAlterQuery($input);
          		$lastInserted=$this->create();
          		if(isset($lastInserted)){return json_encode($this->find($lastInserted));}
            	return $lastInserted;
            	break;
          	case 'DELETE':
            	break;
        }
	}
	

	function readAll(){
		return Wine::all();
	}

	function find($id){
		return Wine::find($id);
	}

	function update(){
		return Wine::update($this->set,$this->key);
	}
	function create(){
		return Wine::create($this->set);
	}
	function delete(){

	}
}
?>