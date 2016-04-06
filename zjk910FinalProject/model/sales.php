<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class sales {

		public $game_title;
		public $release_year;
		public $price;
		public $sys;
		public $units;
		public $last_update;
		public $org;
		public $reg;

		public function __construct($par_name, $par_rdate,$par_price, $par_system, $par_units, $par_update, $par_org, $par_reg) {
			$this->game_title = $par_name;
			$this->release_year = $par_rdate;
			$this->price = $par_price;
			$this->sys = $par_system;
			$this->units = $par_units;
			$this->last_update = $par_update;
			$this->org = $par_org;
			$this->reg = $par_reg;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM sales');

			
			foreach($req->fetchAll() as $sales) {
				$list[]= new sales($sales['game_title'], $sales['release_year'], $sales['price'], $sales['system'], $sales['units'], $sales['last_update'], $sales['organization'], $sales['region']);
			}
			return $list;
		}

		public static function find($title, $rdate, $price, $sys, $org) {
			$list = [];
			$db = Database_Connection::getInstance();

			if (isset($rdate))
			{
				if(isset($price))
				{
					if(isset($sys))
					{
						if(isset($org))
						{
							$req = $db->prepare('SELECT * FROM sales WHERE game_title = :title AND release_year = :rdate AND price = :price AND system = :sys AND organization = :org');
					
							$req->execute(array('title' => $title, 'rdate' => $rdate, 'price' => $price, 'sys' => $sys, 'org' => $org));
							
							$sales = $req->fetch();
							return new sales($sales['game_title'], $sales['release_year'], $sales['price'], $sales['system'], $sales['units'], $sales['last_update'], $sales['organization'], $sales['region']);
						}
						else
						{
							$req = $db->prepare('SELECT * FROM sales WHERE game_title = :title AND release_year = :rdate AND price = :price AND system = :sys');
					
							$req->execute(array('title' => $title, 'rdate' => $rdate, 'price' => $price, 'sys' => $sys));
							
							$sales = $req->fetch();
							foreach($req->fetchAll() as $sale) {
								$list[]= new sales($sales['game_title'], $sales['release_year'], $sales['price'], $sales['system'], $sales['units'], $sales['last_update'], $sales['organization'], $sales['region']);
							}
							return $list;
						}
					}
					else
					{
						$req = $db->prepare('SELECT * FROM sales WHERE game_title = :title AND release_year = :rdate AND price = :price');
						
						$req->execute(array('title' => $title, 'rdate' => $rdate, 'price' => $price));
						$sales = $req->fetch();
						
						foreach($req->fetchAll() as $sale) {
							$list[]= new sales($sales['game_title'], $sales['release_year'], $sales['price'], $sales['system'], $sales['units'], $sales['last_update'], $sales['organization'], $sales['region']);
						}
						return $list;
					}
					
				}
				else
				{
					$req = $db->prepare('SELECT * FROM sales WHERE game_title = :title AND release_year = :rdate');
					
					$req->execute(array('title' => $title, 'rdate' => $rdate));
					$sales = $req->fetch();
					foreach($req->fetchAll() as $sale) {
						$list[]= new sales($sales['game_title'], $sales['release_year'], $sales['price'], $sales['system'], $sales['units'], $sales['last_update'], $sales['organization'], $sales['region']);
					}
					return $list;
				}
				
				

			}
			else
			{
				$req = $db->prepare('SELECT * FROM sales WHERE game_title = :title');
				$req->execute(array('title' => $title));
				foreach($req->fetchAll() as $sale) {
					$list[]= new sales($sales['game_title'], $sales['release_year'], $sales['price'], $sales['system'], $sales['units'], $sales['last_update'], $sales['organization'], $sales['region']);
				}
				return $list;
			}
		}

		public function update($set, $key1, $key2, $key3, $key4, $key5){
			$conn = Database_Connection::getInstance();

			$sql = "update sales set $set where game_title=:title AND release_year=:date AND price=:price AND system = :sys AND organization = :org";

			$stmt = $conn->prepare($sql);

			$stmt->execute(array('title' => $key1, 'date' => $key2, 'price' => $key3, 'sys' => $key4, 'org' => $key5));

			return $stmt->rowCount();
		}


		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into sales set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}

		public static function remove($title, $rdate, $price, $system, $organization){
			$db = Database_Connection::getInstance();
			$req = $db->prepare('DELETE FROM sales WHERE game_title = :title AND release_year = :rdate AND price = :price AND system = :sys AND organization = :org');
			$req->execute(array('title' => $title, 'rdate' => $rdate, 'price' => $price, 'sys' => $system, 'org' => $organization));

			return null;
		}
  }
?>