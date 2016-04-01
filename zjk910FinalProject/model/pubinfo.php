<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class pubinfo {

		public $game_title;
		public $release_date;
		public $publisher;
		public $developer;
		public $budget;

		public function __construct($par_name, $par_rdate,$par_pub, $par_dev, $par_bud) {
			$this->game_title = $par_name;
			$this->release_date = $par_rdate;
			$this->publisher = $par_pub;
			$this->developer = $par_dev;
			$this->budget = $par_bud;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM pubinfo');

			
			foreach($req->fetchAll() as $pubinfo) {
				$list[]= new pubinfo($pubinfo['game_title'], $pubinfo['release_date'], $pubinfo['publisher'], $pubinfo['developer'], $pubinfo['budget']);
			}
			return $list;
		}

		public static function find($title, $rdate) {
			$db = Database_Connection::getInstance();

			if (isset($rdate))
			{
				$req = $db->prepare('SELECT * FROM pubinfo WHERE game_title = :title AND release_date = :rdate');
				$req->execute(array('title' => $title, 'rdate' => $rdate));
				$pubinfo = $req->fetch();

				return new pubinfo($pubinfo['game_title'], $pubinfo['release_date'], $pubinfo['publisher'], $pubinfo['developer'], $pubinfo['budget']);

			}
			else
			{
				$req = $db->prepare('SELECT * FROM pubinfo WHERE game_title = :title');
				$req->execute(array('title' => $title));
				foreach($req->fetchAll() as $game) {
					$list[]= new pubinfo($pubinfo['game_title'], $pubinfo['release_date'], $pubinfo['publisher'], $pubinfo['developer'], $pubinfo['budget']);
				}
				return $list;
			}
		}

		public function update($set, $key1, $key2){
			$conn = Database_Connection::getInstance();

			$sql = "update pubinfo set $set where game_title=:title AND release_date=:date";

			$stmt = $conn->prepare($sql);

			$stmt->execute(array('title' => $key1, 'date' => $key2));

			return $stmt->rowCount();
		}


		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into pubinfo set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}

		public static function remove($title, $rdate){
			$db = Database_Connection::getInstance();
			$req = $db->prepare('DELETE FROM pubinfo WHERE game_title = :title AND release_date = :rdate');
			$req->execute(array('title' => $title, 'rdate' => $rdate));

			return null;
		}
  }
?>