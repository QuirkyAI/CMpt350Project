<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class developer {

		public $name;
		public $foundingy;
		public $finaly;
		public $region;

		public function __construct($par_name, $par_found,$par_final, $par_region) {
			$this->name = $par_name;
			$this->foundingy = $par_found;
			$this->finaly = $par_final;
			$this->region = $par_region;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM developer');

			
			foreach($req->fetchAll() as $developer) {
				$list[]= new developer($developer['developer'], $developer['founding_year'], $developer['final_year'], $developer['hq_region']);
			}
			return $list;
		}

		public static function find($title) {
			$db = Database_Connection::getInstance();

			$req = $db->prepare('SELECT * FROM developer WHERE developer = :title');
			$req->execute(array('title' => $title));
			$developer = $req->fetch();

			return new developer($developer['developer'], $developer['founding_year'], $developer['final_year'], $developer['hq_region']);
		}

		public function update($set, $key1){
			$conn = Database_Connection::getInstance();

			$sql = "update developer set $set where developer=:title";

			$stmt = $conn->prepare($sql);

			$stmt->execute(array('title' => $key1));

			return $stmt->rowCount();
		}


		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into developer set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}

		public static function remove($title){
			$db = Database_Connection::getInstance();
			$req = $db->prepare('DELETE FROM developer WHERE game_title = :title');
			$req->execute(array('title' => $title));

			return null;
		}
  }
?>