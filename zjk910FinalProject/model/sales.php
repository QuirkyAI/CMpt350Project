<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class sales {

		public $game_title;
		public $release_date;
		public $price;
		public $units;

		public function __construct($par_name, $par_rdate,$par_price, $par_units) {
			$this->game_title = $par_name;
			$this->release_date = $par_rdate;
			$this->$price = $par_price;
			$this->$units = $par_units;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM salesinfo');

			
			foreach($req->fetchAll() as $sales) {
				$list[]= new sales($sales['game_title'], $sales['release_date'], $sales['price'], $sales['units']);
			}
			return $list;
		}

		public static function find($title, $rdate, $price) {
			$db = Database_Connection::getInstance();

			if (isset($rdate))
			{
				if(isset($price))
				{
					$req = $db->prepare('SELECT * FROM salesinfo WHERE game_title = :title AND release_date = :rdate AND price = :price');
					
					$req->execute(array('title' => $title, 'rdate' => $rdate, 'price' => $price));
					$sale = $req->fetch();

					return new sale($sale['sale_title'], $sale['release_date'], $sale['price'], $sale['unit']);
				}
				else
				{
					$req = $db->prepare('SELECT * FROM salesinfo WHERE game_title = :title AND release_date = :rdate');
					
					$req->execute(array('title' => $title, 'rdate' => $rdate));
					$sale = $req->fetch();
					foreach($req->fetchAll() as $sale) {
						$list[]= new sale($sale['sale_title'], $sale['release_date'], $sale['price'], $sale['unit']);
					}
					return $list;
				}
				
				

			}
			else
			{
				$req = $db->prepare('SELECT * FROM salesinfo WHERE game_title = :title');
				$req->execute(array('title' => $title));
				foreach($req->fetchAll() as $sale) {
					$list[]= new sale($sale['sale_title'], $sale['release_date'], $sale['price'], $sale['unit']);
				}
				return $list;
			}
		}

		public function update($set, $key1, $key2, $key3){
			$conn = Database_Connection::getInstance();

			$sql = "update salesinfo set $set where game_title=:title AND release_date=:date AND price=:price";

			$stmt = $conn->prepare($sql);

			$stmt->execute(array('title' => $key1, 'date' => $key2, 'price' => $key3));

			return $stmt->rowCount();
		}


		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into salesinfo set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}

		public static function remove($title, $rdate){
			$db = Database_Connection::getInstance();
			$req = $db->prepare('DELETE FROM salesinfo WHERE game_title = :title AND release_date = :rdate');
			$req->execute(array('title' => $title, 'rdate' => $rdate));

			return null;
		}
  }
?>