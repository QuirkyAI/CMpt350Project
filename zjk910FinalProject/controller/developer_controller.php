<?php 
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('model/Connection.php');
	require_once('model/developer.php');

	class developer_controller{
		private $dbInstance;
		private $sql;
		private $numberRows=0;
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
			$this->table = $routes[0];
			$this->key = $routes[1];


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
					if(isset($this->key)){
						return json_encode($this->remove($this->key));
					}
					break;
			}
		}
		

		function readAll(){
			return developer::all();
		}

		function find($id1){
			return developer::find($id1);
		}

		function update(){
			return developer::update($this->set,$this->key);
		}
		function create(){
			return developer::create($this->set);
		}
		function remove($id1){
			return developer::remove($id1);
		}
	}
?>