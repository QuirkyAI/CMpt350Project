<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class games_regions {

		public $game_title;
		public $release_year;
		public $region;

		public function __construct($par_name, $par_rdate, $par_region) {
			$this->game_title = $par_name;
			$this->release_year = $par_rdate;
			$this->region = $par_region;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM games_regions');

			
			foreach($req->fetchAll() as $games_regions) {
				$list[]= new $games_regions($games_regions['game_title'], $games_regions['release_year'],  $games_regions['region']);
			}
			return $list;
		}

		public static function find($title, $rdate, $reg) {
			$db = Database_Connection::getInstance();

			if (isset($rdate))
			{
				if(isset($price))
				{
					$req = $db->prepare('SELECT * FROM games_regions WHERE game_title = :title AND release_year = :rdate AND region = :reg');
					
					$req->execute(array('title' => $title, 'rdate' => $rdate, 'reg' => $reg));
					$games_regions = $req->fetch();

					return new $games_regions($games_regions['game_title'], $games_regions['release_year'],  $games_regions['region']);
				}
				else
				{
					$req = $db->prepare('SELECT * FROM games_regions WHERE game_title = :title AND release_year = :rdate');
					
					$req->execute(array('title' => $title, 'rdate' => $rdate));
					$games_regions = $req->fetch();
					foreach($req->fetchAll() as $games_regions) {
						$list[]= new $games_regions($games_regions['game_title'], $games_regions['release_year'],  $games_regions['region']);
					}
					return $list;
				}
				
				

			}
			else
			{
				$req = $db->prepare('SELECT * FROM games_regions WHERE game_title = :title');
				$req->execute(array('title' => $title));
				foreach($req->fetchAll() as $games_regions) {
					$list[]= new $games_regions($games_regions['game_title'], $games_regions['release_year'],  $games_regions['region']);
				}
				return $list;
			}
		}

		public function update($set, $key1, $key2, $key3){
			$conn = Database_Connection::getInstance();

			$sql = "update games_regions set $set where game_title=:title AND release_year=:date AND reg=:reg";

			$stmt = $conn->prepare($sql);

			$stmt->execute(array('title' => $key1, 'date' => $key2, 'reg' => $key3));

			return $stmt->rowCount();
		}


		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into games_regions set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}

		public static function remove($title, $rdate, $region){
			$db = Database_Connection::getInstance();
			$req = $db->prepare('DELETE FROM games_regions WHERE game_title = :title AND release_year = :rdate AND region = :reg');
			$req->execute(array('title' => $title, 'rdate' => $rdate, 'reg' => $region));

			return null;
		}
  }
?>