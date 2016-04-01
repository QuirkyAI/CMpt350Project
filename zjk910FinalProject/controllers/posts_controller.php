<?php
  require_once('models/post.php');
  class PostsController {
    public function index() {
      // The data retrieved from the database is stored in the variable $posts.
      $posts = Post::all();  //Post method is available because the file (post.php) that has it is required in routes.php
      require_once('views/posts/index.php');
    }

    public function show() {
      // The expected URL is: ?controller=posts&action=show&id=x
      // If the id is not sent the the error page is called as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // The given id is used to get the right post
      $post = Post::find($_GET['id']);
      require_once('views/posts/show.php');
    }
  }
?>