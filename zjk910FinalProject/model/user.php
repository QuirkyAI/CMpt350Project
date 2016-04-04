<?php
	// email: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636
	require_once('Connection.php');
	class user {

		public $email;
		public $password;

		public function __construct($par_email, $par_pass) {
			$this->email = $par_email;
			$this->password = $par_pass;
		}

		public static function find($email, $pass) {
			$db = Database_Connection::getInstance();

			$req = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :pass');
			$req->execute(array('email' => $email, 'pass' => $pass));
			$user = $req->fetch();

			return new user($user['email'], $user['password']);
		}

		public static function create($set){
			$conn = Database_Connection::getInstance();

			$sql = "insert into users set $set";

			$stmt = $conn->prepare($sql);

			$stmt->execute();

			return $conn->lastInsertId();
		}
  }
?>