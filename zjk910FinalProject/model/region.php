<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class region {

		public $region;

		public function __construct($par_region) {
			$this->region = $par_region;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM regions');

			
			foreach($req->fetchAll() as $region) {
				$list[]= new region($region['region']);
			}
			return $list;
		}
	}
?>