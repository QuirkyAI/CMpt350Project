<?php
	function call($controller, $action) {
    require_once('controller/pages_controller.php');

    $controller = new PagesController();

    $controller->{ $action }();
  }
  
  
  $controllers = array('pages' => ['home', 'error', 'add', 'read', 'modify', 'remove']);

  
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>