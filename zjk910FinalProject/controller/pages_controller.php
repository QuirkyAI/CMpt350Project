<?php
  class PagesController {
	public function home() {
		require_once('views/pages/home.php');
    }
	
	public function add() {
		require_once('views/pages/post.html');
	}
	
	public function read() {
		require_once('views/pages/get.html');
	}

    public function error() {
		require_once('views/pages/error.php');
    }
  }
?>