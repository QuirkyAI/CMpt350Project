<?php

// Function that calls the controller
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
      break;
    }

    $controller->{ $action }();
  }


//This portion of the code executes first
// Adding entries for the new controllers and its actions
  $controllers = array('pages' => ['home', 'error'], //controller: pages.  functions: home, error
                       'posts' => ['index', 'show']);//controller: posts.  functions: index, show

  
  if (array_key_exists($controller, $controllers)) {// The variable $controller was declared in the file index.php
    if (in_array($action, $controllers[$controller])) {// The variable $action was declared in the file index.php
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }

?>