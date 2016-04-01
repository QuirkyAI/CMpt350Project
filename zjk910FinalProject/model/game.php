<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class game {

		public $game_title;
		public $release_date;
		public $description;

		public function __construct($par_name, $par_rdate,$par_description) {
			$this->game_title = $par_name;
			$this->release_date = $par_rdate;
			$this->description = $par_description;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM gameinfo');

			
			foreach($req->fetchAll() as $game) {
				$list[]= new game($game['game_title'], $game['release_date'],$game['description']);
			}
			return $list;
		}

		public static function find($title, $rdate) {
			$db = Database_Connection::getInstance();

			if (isset($rdate))
			{
				$req = $db->prepare('SELECT * FROM gameinfo WHERE game_title = :title AND release_date = :rdate');
				$req->execute(array('title' => $title, 'rdate' => $rdate));
				$game = $req->fetch();

				return new game($game['game_title'], $game['release_date'],$game['description']);

			}
			else
			{
				$req = $db->prepare('SELECT * FROM gameinfo WHERE game_title = :title');
				$req->execute(array('title' => $title));
				foreach($req->fetchAll() as $game) {
					$list[]= new game($game['game_title'], $game['release_date'],$game['description']);
				}
				return $list;
			}
		}

		public function update($set,$key1, $key2){
			$conn = Database_Connection::getInstance();

			$sql = "update gameinfo set $set where game_title=:title AND release_date=:date";

			$stmt = $conn->prepare($sql);

			$stmt->execute(array('title' => $key1, 'date' => $key2));

			return $stmt->rowCount();
		}


		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into gameinfo set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}

		public static function remove($title, $rdate){
			$db = Database_Connection::getInstance();
			$req = $db->prepare('DELETE FROM gameinfo WHERE game_title = :title AND release_date = :rdate');
			$req->execute(array('title' => $title, 'rdate' => $rdate));

			return null;
		}
  }
?>