<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class sys {

		public $sys;

		public function __construct($par_system) {
			$this->sys = $par_system;
		}

		public static function all() {
			$list = [];
			$db = Database_Connection::getInstance();
			$req = $db->query('SELECT * FROM systems');

			
			foreach($req->fetchAll() as $system) {
				$list[]= new sys($system['system']);
			}
			return $list;
		}
	}
?>