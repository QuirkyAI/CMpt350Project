<?php
  class PagesController {
	public function home() {
		require_once('views/pages/home.php');
    }
	
	public function add() {
		require_once('views/post.html');
	}
	
	public function read() {
		require_once('views/get.html');
	}
	
	public function login() {
		require_once('views/pages/login.php');
	}

    public function error() {
		require_once('views/pages/error.php');
    }
  }
?>