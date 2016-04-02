<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class game {

		public $game_title;
		public $release_year;
		public $publisher;
		public $developer;
		public $budget;

		public function __construct($par_name, $par_rdate,$par_publisher, $par_developer, $par_bud) {
			$this->game_title = $par_name;
			$this->release_year = $par_rdate;
			$this->publisher = $par_publisher;
			$this->developer = $par_developer;
			$this->budget = $par_bud;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM games');

			
			foreach($req->fetchAll() as $game) {
				$list[]= new game($game['game_title'], $game['release_year'],$game['publisher'], $game['developer'], $game['budget']);
			}
			return $list;
		}

		public static function find($title, $rdate) {
			$db = Database_Connection::getInstance();

			if (isset($rdate))
			{
				$req = $db->prepare('SELECT * FROM games WHERE game_title = :title AND release_year = :rdate');
				$req->execute(array('title' => $title, 'rdate' => $rdate));
				$game = $req->fetch();

				return new game($game['game_title'], $game['release_year'],$game['publisher'], $game['developer'], $game['budget']);

			}
			else
			{
				$req = $db->prepare('SELECT * FROM games WHERE game_title = :title');
				$req->execute(array('title' => $title));
				foreach($req->fetchAll() as $game) {
					$list[]= new game($game['game_title'], $game['release_year'],$game['publisher'], $game['developer'], $game['budget']);
				}
				return $list;
			}
		}

		public function update($set,$key1, $key2){
			$conn = Database_Connection::getInstance();

			$sql = "update games set $set where game_title=:title AND release_year=:date";

			$stmt = $conn->prepare($sql);

			$stmt->execute(array('title' => $key1, 'date' => $key2));

			return $stmt->rowCount();
		}


		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into games set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}

		public static function remove($title, $rdate){
			$db = Database_Connection::getInstance();
			$req = $db->prepare('DELETE FROM games WHERE game_title = :title AND release_year = :rdate');
			$req->execute(array('title' => $title, 'rdate' => $rdate));

			return null;
		}
  }
?>