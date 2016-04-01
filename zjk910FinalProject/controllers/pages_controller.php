<?php
  class PagesController {
    /*This action of this controller just displays two variables.
      This is the default action when charging the index.php.
    */
    public function home() {
      $first_name = 'Mayra';
      $last_name  = 'Samaniego';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>