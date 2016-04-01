<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636

	require_once('controller/game_controller.php');
	require_once('controller/pubinfo_controller.php');
	require_once('controller/sales_controller.php');

	function getCurrentUri()
	  	  {
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));

		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		$uri = '/' . trim($uri, '/');
		return $uri;
	  }

	  $base_url = getCurrentUri();

	  $routes = array();
	  $base_routes = explode('/', $base_url);


	  foreach($base_routes as $route)
	  {
		if(trim($route) != '')
		  
		  
		  array_push($routes,$route);
	  }

	  $objgame_controller= new game_controller();
	  $objpubinfo_controller = new pubinfo_controller();
	  $objsales_controller = new sales_controller();
	  $method = $_SERVER['REQUEST_METHOD'];

	 
	  if (preg_match('/[a-z]/',$routes[0]))
	  {
		if($routes[0]=="gameinfo")
		{
			if(isset($routes[1]))
			{			
				if(preg_match('/[a-z]/',$routes[1]))
				{
					if (isset($routes[2]))
					{
						if(preg_match('/[0-9]*-[0-9]*-[0-9]*/', $routes[2]))
						{
							$objgame_controller->setParameters($routes);
						}
					}
					else
					{
						$objgame_controller->setParameters($routes);
					}
				}
				
			}
			$input = json_decode(file_get_contents('php://input'),true);
			echo ($objgame_controller->setQuery($method,$input));
		}
		if($routes[0]=="pubinfo")
		{
			if(isset($routes[1]))
			{
				if(preg_match('/[a-z]/',$routes[1]))
				{
					if (isset($routes[2]))
					{
						if(preg_match('/[0-9]*-[0-9]*-[0-9]*/', $routes[2]))
						{
							$objpubinfo_controller->setParameters($routes);
						}
					}
					else
					{
						$objpubinfo_controller->setParameters($routes);
					}
				}
			}
			$input = json_decode(file_get_contents('php://input'),true);
			echo ($objpubinfo_controller->setQuery($method,$input));
		}
		if($routes[0]=="sales")
		{
			if(isset($routes[1]))
			{
				if(preg_match('/[a-z]/',$routes[1]))
				{
					if (isset($routes[2]))
					{
						if(preg_match('/[0-9]*-[0-9]*-[0-9]*/', $routes[2]))
						{
							if(isset($routes[3]))
							{
								if(preg_match('/[0-9]*.[0-9][0-9]/', routes[3]))
								{
									$objsales_controller->setParameters($routes);
								}
							}
							$objsales_controller->setParameters($routes);				
						}
					}
					else
					{
						$objsales_controller->setParameters($routes);
					}
				}
			}
			$input = json_decode(file_get_contents('php://input'),true);
			echo ($objsales_controller->setQuery($method,$input));
		}
	}
?>