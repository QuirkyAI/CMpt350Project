<?php
  require_once('Connection.php');
  class Wine {

    public $id;
    public $name;
    public $year;
    public $grapes;
    public $country;
    public $region;
    public $description;
    public $picture;

    public function __construct($par_id,$par_name, $par_year,$par_grapes, $par_country,$par_region,$par_description,$par_picture) {
      $this->id = $par_id;
      $this->name = $par_name;
      $this->year = $par_year;
      $this->grapes = $par_grapes;
      $this->country = $par_country;
      $this->region = $par_region;
      $this->description = $par_description;
      $this->picture = $par_picture;
    }

    public static function all() {
      $list = [];
      $db = Database_Connection::getInstance();
      $req = $db->query('SELECT * FROM wine');

      // Creating a list of Wine objects from the database results
      foreach($req->fetchAll() as $wine) {
        $list[]= new Wine($wine['id'], $wine['name'], $wine['year'],$wine['grapes'],$wine['country'],$wine['region'],$wine['description'],$wine['picture']);
      }
      return $list;
    }

    public static function find($id) {
      $db = Database_Connection::getInstance();

      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM wine WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $wine = $req->fetch();

      return new Wine($wine['id'], $wine['name'], $wine['year'],$wine['grapes'],$wine['country'],$wine['region'],$wine['description'],$wine['picture']);
    }

    public function update($set,$key){
      $conn = Database_Connection::getInstance();

      $sql = "update wine set $set where id=$key";

      $stmt = $conn->prepare($sql);

      $stmt->execute();

      return $stmt->rowCount();
    }


    public static function create($set){
      $conn = Database_Connection::getInstance();

      $sql = "insert into wine set $set";

      $stmt = $conn->prepare($sql);

      $stmt->execute();

      return $conn->lastInsertId();
    }
  }
?>