<!-- Example of MVC  for the Web
Ref.: http://requiremind.com/a-most-simple-php-mvc-beginners-tutorial/

		Pitt, C., & SpringerLink. (2012). Pro PHP MVC.
-->

<?php
// This is the user interface
  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }
  require_once('views/layout.php');
?>

