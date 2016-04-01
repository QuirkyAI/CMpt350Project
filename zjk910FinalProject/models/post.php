<?php
  require_once('connection.php');
  class Post {

    // In this case the attributes are public so that we can access them using $post->id directly
    // However you can use __get and __set magic methods (see magic_methods/magic.php) to fulfill the
    //object oriented access modifiers concept
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $comment;

    public function __construct($id, $firstname, $lastname,$email, $comment) {
      $this->id      = $id;
      $this->firstname  = $firstname;
      $this->content = $lastname;
      $this->email      = $email;
      $this->comment  = $comment;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM posts');

      // Creating a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['firstname'], $post['lastname'],$post['email'],$post['comment']);
      }
      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['firstname'], $post['lastname'],$post['email'],$post['comment']);
    }
  }
?>