<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class games_systems {

		public $game_title;
		public $release_year;
		public $sys;

		public function __construct($par_name, $par_rdate, $par_system) {
			$this->game_title = $par_name;
			$this->release_year = $par_rdate;
			$this->sys = $par_system;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM games_systems');

			
			foreach($req->fetchAll() as $games_systems) {
				$list[]= new $games_systems($games_systems['game_title'], $games_systems['release_year'],  $games_systems['system']);
			}
			return $list;
		}

		public static function find($title, $rdate, $sys) {
			$db = Database_Connection::getInstance();

			if (isset($rdate))
			{
				if(isset($price))
				{
					$req = $db->prepare('SELECT * FROM games_systems WHERE game_title = :title AND release_year = :rdate AND system = :sys');
					
					$req->execute(array('title' => $title, 'rdate' => $rdate, 'sys' => $sys));
					$games_systems = $req->fetch();

					return new games_systems($games_systems['game_title'], $games_systems['release_year'], $games_systems['system']);
				}
				else
				{
					$req = $db->prepare('SELECT * FROM games_systems WHERE game_title = :title AND release_year = :rdate');
					
					$req->execute(array('title' => $title, 'rdate' => $rdate));
					$sale = $req->fetch();
					foreach($req->fetchAll() as $sale) {
						$list[]= new games_systems($games_systems['game_title'], $games_systems['release_year'], $games_systems['system']);
					}
					return $list;
				}
				
				

			}
			else
			{
				$req = $db->prepare('SELECT * FROM games_systems WHERE game_title = :title');
				$req->execute(array('title' => $title));
				foreach($req->fetchAll() as $sale) {
					$list[]= new games_systems($games_systems['game_title'], $games_systems['release_year'], $games_systems['system']);
				}
				return $list;
			}
		}

		public function update($set, $key1, $key2, $key3){
			$conn = Database_Connection::getInstance();

			$sql = "update games_systems set $set where game_title=:title AND release_year=:date AND price=:price";

			$stmt = $conn->prepare($sql);

			$stmt->execute(array('title' => $key1, 'date' => $key2, 'price' => $key3));

			return $stmt->rowCount();
		}


		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into games_systems set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}

		public static function remove($title, $rdate, $system){
			$db = Database_Connection::getInstance();
			$req = $db->prepare('DELETE FROM games_systems WHERE game_title = :title AND release_year = :rdate AND system = :sys');
			$req->execute(array('title' => $title, 'rdate' => $rdate, 'sys' => $system));

			return null;
		}
  }
?>