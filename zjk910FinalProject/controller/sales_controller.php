<?php 
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('model/Connection.php');
	require_once('model/sales.php');

	class sales_controller{
		private $dbInstance;
		private $sql;
		private $numberRows=0;
		private $set;
		private $table;
		private $key;
		private $key2;
		private $key3;
		private $key4;
		private $key5;

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
			$this->table = $routes[0];
			$this->key = $routes[1];
			if(isset ($routes[2]))
			{
				$this->key2 = $routes[2];
			}
			if(isset ($routes[3]))
			{
				$this->key3 = $routes[3];
			}
			if(isset ($routes[4]))
			{
				$this->key4 = $routes[4];
			}
			if(isset ($routes[5]))
			{
				$this->key5 = $routes[5];
			}
		}
		
		
		function setAlterQuery($input){
			
			$columns = array_keys($input);

			$connection=$this->dbInstance;

			$values = array_map(function ($value) use ($connection) {
			  if ($value===null) return null;
			  return (string)$value;
			},array_values($input));


			for ($i=0; $i<count($columns); $i++) {
			  $this->set.=($i>0?',':'').'`'.$columns[$i].'`=';
			  $this->set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
			}
		}
		
		
		/*
		Setting the correct SQL query dependant on the requested method
		*/
		function setQuery($method,$input){
			switch ($method) {
				case 'GET':
					if(isset($this->key)){
						return json_encode($this->find($this->key,$this->key2,$this->key3, $this->key4, $this->key5));
					}else{
						return json_encode($this->readAll());
					}
					break;
				case 'PUT':
					$this->setAlterQuery($input);
					$updated_rows=$this->update();
					if($updated_rows>0){return json_encode($this->key,$this->key2,$this->key3, $this->key4, $this->key5);}
					return $updated_rows;
					break;
				case 'POST':
					$this->setAlterQuery($input);
					$lastInserted=$this->create();
					if(isset($lastInserted)){return json_encode($this->find($lastInserted));}
					return $lastInserted;
					break;
				case 'DELETE':
					if(isset($this->key) && isset($this->key2) && isset($this->key3) && isset($this->key4) && isset($this->key5)){
						return json_encode($this->remove($this->key,$this->key2,$this->key3,$this->key4,$this->key5));
					}
					break;
			}
		}
		

		function readAll(){
			return sales::all();
		}

		function find($id1, $id2, $id3){
			return sales::find($id1, $id2, $id3);
		}

		function update(){
			return sales::update($this->key,$this->key2,$this->key3, $this->key4, $this->key5);
		}
		function create(){
			return sales::create($this->set);
		}
		function remove($id1, $id2, $id3, $id4, $id5){
			return sales::remove($id1, $id2, $id3, $id4, $id5);
		}
	}
?>