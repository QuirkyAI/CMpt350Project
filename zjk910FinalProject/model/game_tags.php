<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class game_tags {

		public $game_title;
		public $release_year;
		public $tag;

		public function __construct($par_name, $par_rdate, $par_tag) {
			$this->game_title = $par_name;
			$this->release_year = $par_rdate;
			$this->tag = $par_tag;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM game_tags');

			
			foreach($req->fetchAll() as $game_tags) {
				$list[]= new game_tags($game_tags['game_title'], $game_tags['release_year'],  $game_tags['tag']);
			}
			return $list;
		}

		public static function find($title, $rdate, $tag) {
			$list = [];
			$db = Database_Connection::getInstance();

			if (isset($rdate))
			{
				if(isset($tag))
				{
					$req = $db->prepare('SELECT * FROM game_tags WHERE game_title = :title AND release_year = :rdate AND tag = :tag');
					
					$req->execute(array('title' => $title, 'rdate' => $rdate, 'tag' => $tag));
					$game_tags = $req->fetch();

					return new game_tags($game_tags['game_title'], $game_tags['release_year'],  $game_tags['tag']);
				}
				else
				{
					$req = $db->prepare('SELECT * FROM game_tags WHERE game_title = :title AND release_year = :rdate');
					
					$req->execute(array('title' => $title, 'rdate' => $rdate));
					$game_tags = $req->fetch();
					foreach($req->fetchAll() as $game_tags) {
						$list[]= new game_tags($game_tags['game_title'], $game_tags['release_year'],  $game_tags['tag']);
					}
					return $list;
				}
				
				

			}
			else
			{
				$req = $db->prepare('SELECT * FROM game_tags WHERE game_title = :title');
				$req->execute(array('title' => $title));
				foreach($req->fetchAll() as $game_tags) {
					$list[]= new game_tags($game_tags['game_title'], $game_tags['release_year'],  $game_tags['tag']);
				}
				return $list;
			}
		}

		public function update($set, $key1, $key2, $key3){
			$conn = Database_Connection::getInstance();

			$sql = "update game_tags set $set where game_title=:title AND release_year=:date AND tag=:tag";

			$stmt = $conn->prepare($sql);

			$stmt->execute(array('title' => $key1, 'date' => $key2, 'tag' => $key3));

			return $stmt->rowCount();
		}


		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into game_tags set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}

		public static function remove($title, $rdate, $tag){
			$db = Database_Connection::getInstance();
			$req = $db->prepare('DELETE FROM game_tags WHERE game_title = :title AND release_year = :rdate AND tag = :tag');
			$req->execute(array('title' => $title, 'rdate' => $rdate, 'tag' => $tag));

			return null;
		}
  }
?>