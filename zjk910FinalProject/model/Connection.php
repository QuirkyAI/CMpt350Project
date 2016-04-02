<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	class Database_Connection {
		private static $instance = NULL;

		private function __construct() {}

		private function __clone() {}

		public static function getInstance() {
		  if (!isset(self::$instance)) {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			self::$instance = new PDO('mysql:host=localhost;dbname=gamedb', 'root', '', $pdo_options);
		  }
		  return self::$instance;
		}

		public static function getQuery($method, $table, $key1, $key2, $key3, $set){
				if (isset($key3))
				{
					if ($table=='sales')
					{
						switch ($method) {
							case 'GET':
								$sql = "select * from `$table`".($key1?" WHERE Game Title=$key1":'').($key2?" AND Release Date=$key2 AND Price=$key3":''); //a short form to write an if/else
								break;
							case 'PUT':
								$sql = "update `$table` set $set where Game Title=$key1 and Release Date = $key2 AND Price=$key3"; 
								break;
							case 'POST':
								$sql = "insert into `$table` set $set"; 
								break;
							case 'DELETE':
								$sql = "delete from `$table` where Game Title=$key1 AND Release Date = $key2 AND Price=$key3"; 
								break;
						}
					}
					
					elseif ($table=='games_regions')
					{
						switch ($method) {
							case 'GET':
								$sql = "select * from `$table`".($key1?" WHERE Game Title=$key1":'').($key2?" AND Release Date=$key2 AND Region=$key3":''); //a short form to write an if/else
								break;
							case 'PUT':
								$sql = "update `$table` set $set where Game Title=$key1 and Release Date = $key2 AND Region=$key3"; 
								break;
							case 'POST':
								$sql = "insert into `$table` set $set"; 
								break;
							case 'DELETE':
								$sql = "delete from `$table` where Game Title=$key1 AND Release Date = $key2 AND Region=$key3"; 
								break;
						}
					}
					
					elseif ($table=='games_tags')
					{
						switch ($method) {
							case 'GET':
								$sql = "select * from `$table`".($key1?" WHERE Game Title=$key1":'').($key2?" AND Release Date=$key2 AND Tag=$key3":''); //a short form to write an if/else
								break;
							case 'PUT':
								$sql = "update `$table` set $set where Game Title=$key1 and Release Date = $key2 AND Tag=$key3"; 
								break;
							case 'POST':
								$sql = "insert into `$table` set $set"; 
								break;
							case 'DELETE':
								$sql = "delete from `$table` where Game Title=$key1 AND Release Date = $key2 AND Tag=$key3"; 
								break;
						}
					}
				}
				else
				{
					if ($table=='publisher')
					{
						switch ($method) {
							case 'GET':
								$sql = "select * from `$table`".($key1?" WHERE publisher=$key1":'');
								break;
							case 'PUT':
								$sql = "update `$table` set $set where publisher=$key1"; 
								break;
							case 'POST':
								$sql = "insert into `$table` set $set"; 
								break;
							case 'DELETE':
								$sql = "delete from `$table` where publisher=$key1"; 
								break;
						}
					}
					
					elseif ($table=='developer')
					{
						switch ($method) {
							case 'GET':
								$sql = "select * from `$table`".($key1?" WHERE developer=$key1":'');
								break;
							case 'PUT':
								$sql = "update `$table` set $set where developer=$key1"; 
								break;
							case 'POST':
								$sql = "insert into `$table` set $set"; 
								break;
							case 'DELETE':
								$sql = "delete from `$table` where developer=$key1"; 
								break;
						}
					}
					
					elseif ($table=='region')
					{
						switch ($method) {
							case 'GET':
								$sql = "select * from `$table`";
								break;
						}
					}
					elseif ($table=='systems')
					{
						switch ($method) {
							case 'GET':
								$sql = "select * from `$table`";
								break;
						}
					}
					else
					{
						switch ($method) {
							case 'GET':
								$sql = "select * from `$table`".($key1?" WHERE Game Title=$key1":'').($key2?" AND Release Date=$key2":''); //a short form to write an if/else
								break;
							case 'PUT':
								$sql = "update `$table` set $set where Game Title=$key1 and Release Date = $key2"; 
								break;
							case 'POST':
								$sql = "insert into `$table` set $set"; 
								break;
							case 'DELETE':
								$sql = "delete from `$table` where Game Title=$key1 and Release Date = $key2"; 
								break;
						}
					}
				}
			  
			
			return $sql;
		}

		public static function executeQuery($sql){
		  $result = mysqli_query(self::$instance,$sql);
			if (!$result) {
			  http_response_code(404);
			}
			return $result;
		}

		function closeConnection(){
		  mysqli_close($this->dbInstance);
		}
  }
?>