<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class publisher {

		public $publisher;
		public $founding_year;
		public $final_year;
		public $hq_region;

		public function __construct($par_name, $par_found,$par_final, $par_region) {
			$this->publisher = $par_name;
			$this->founding_year = $par_found;
			$this->final_year = $par_final;
			$this->hq_region = $par_region;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM publisher');

			
			foreach($req->fetchAll() as $publisher) {
				$list[]= new publisher($publisher['publisher'], $publisher['founding_year'], $publisher['final_year'], $publisher['hq_region']);
			}
			return $list;
		}

		public static function find($title) {
			$db = Database_Connection::getInstance();

			$req = $db->prepare('SELECT * FROM publisher WHERE publisher = :title');
			$req->execute(array('title' => $title));
			$publisher = $req->fetch();

			return new publisher($publisher['publisher'], $publisher['founding_year'], $publisher['final_year'], $publisher['hq_region']);
		}

		public function update($set, $key1){
			$conn = Database_Connection::getInstance();

			$sql = "update publisher set $set where publisher=:title";

			$stmt = $conn->prepare($sql);

			$stmt->execute(array('title' => $key1));

			return $stmt->rowCount();
		}


		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into publisher set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}

		public static function remove($title){
			$db = Database_Connection::getInstance();
			$req = $db->prepare('DELETE FROM publisher WHERE game_title = :title');
			$req->execute(array('title' => $title));

			return null;
		}
  }
?>