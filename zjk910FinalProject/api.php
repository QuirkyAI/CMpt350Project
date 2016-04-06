<?php
	// NAME: Zachary Knippel
	// NSID: zjk910
	// STUDENT NO." 11083636

	require_once('controller/developer_controller.php');
	require_once('controller/game_controller.php');
	require_once('controller/gamesystems_controller.php');
	require_once('controller/gameregions_controller.php');
	require_once('controller/gametags_controller.php');
	require_once('controller/publisher_controller.php');
	require_once('controller/regions_controller.php');
	require_once('controller/sales_controller.php');
	require_once('controller/systems_controller.php');

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

	  $objdev_controller = new developer_controller();
	  $objgame_controller= new game_controller();
	  $objgs_controller = new gamesystems_controller();
	  $objgr_controller = new gameregions_controller();
	  $objgtags_controller = new gametags_controller();
	  $objpub_controller = new publisher_controller();
	  $objreg_controller = new regions_controller();
	  $objsales_controller = new sales_controller();
	  $objsys_controller = new systems_controller();
	  $method = $_SERVER['REQUEST_METHOD'];

	 
	  if (preg_match('/[a-z]*[_]*[a-z]*/',$routes[0]))
	  {
		  
		// Contacting developers table
		if($routes[0]=='developers')
		{
			// Checking to see if the name of a developer has been given
			if (isset($routes[1]))
			{
				if(preg_match('/[a-z]*/',$routes[1]))
				{
					$objdev_controller->setParameters($routes);
				}
			}
			else
			{
				$objdev_controller->setParameters($routes);
			}
			$input = json_decode(file_get_contents('php://input'),true);
			echo ($objdev_controller->setQuery($method,$input));
		}
		
		// Contacting the games table
		if($routes[0]=="games")
		{
			// Checking to see if a game title has been given
			if(isset($routes[1]))
			{			
				if(preg_match('/[a-z]*/',$routes[1]))
				{
					// Checking to see if a release date has been given
					if (isset($routes[2]))
					{
						
						if(preg_match('/[0-9]*/', $routes[2]))
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
		
		// Contacting the games_systems table
		if($routes[0]=="games_systems")
		{
			// Checking to see if a game title has been given
			if(isset($routes[1]))
			{			
				if(preg_match('/[a-z]*/',$routes[1]))
				{
					// Checking to see if a release date has been given
					if (isset($routes[2]))
					{
						
						if(preg_match('/[0-9]*/', $routes[2]))
						{
							
							// Checking to see if a system has been given
							if(isset($routes[3]))
							{
								$objgs_controller->setParameters($routes);
							}
							else
							{
								$objgs_controller->setParameters($routes);
							}
						}
					}
					else
					{
						$objgs_controller->setParameters($routes);
					}
				}
			}
			$input = json_decode(file_get_contents('php://input'),true);
			echo ($objgs_controller->setQuery($method,$input));
		}
		
		// Contacting the games_regions table
		if($routes[0]=="game_regions")
		{
			// Checking to see if a game title has been given
			if(isset($routes[1]))
			{			
				if(preg_match('/[a-z]*/',$routes[1]))
				{
					// Checking to see if a release date has been given
					if (isset($routes[2]))
					{
						if(preg_match('/[0-9]*/', $routes[2]))
						{
							
							// Checking to see if a region has been given
							if(isset($routes[3]))
							{
							if(preg_match('/[a-z]*/', $routes[3]))
								$objgr_controller->setParameters($routes);
							}
							else
							{
								$objgr_controller->setParameters($routes);
							}
						}
					}
					else
					{
						$objgr_controller->setParameters($routes);
					}
				}
			}
			$input = json_decode(file_get_contents('php://input'),true);
			echo ($objgr_controller->setQuery($method,$input));
		}
		
		
		// Contacting the games_tags table
		if($routes[0]=="game_tags")
		{
			// Checking to see if a game title has been given
			if(isset($routes[1]))
			{			
				if(preg_match('/[a-z]*/',$routes[1]))
				{
					// Checking to see if a release date has been given
					if (isset($routes[2]))
					{
						if(preg_match('/[0-9]*/', $routes[2]))
						{
							
							// Checking to see if a region has been given
							if(isset($routes[3]))
							{
								$objgtags_controller->setParameters($routes);
							}
							else
							{
								$objgtags_controller->setParameters($routes);
							}
						}
					}
					else
					{
						$objgtags_controller->setParameters($routes);
					}
				}
			}
			$input = json_decode(file_get_contents('php://input'),true);
			echo ($objgtags_controller->setQuery($method,$input));
		}
		
		
		
		
		// Contacting publishers table
		if($routes[0]=='publishers')
		{
			// Checking to see if the name of a publisher has been given
			if (isset($routes[1]))
			{
				if(preg_match('/[a-z]*/',$routes[1]))
				{
					$objpub_controller->setParameters($routes);
				}
			}
			else
			{
				$objpub_controller->setParameters($routes);
			}
			$input = json_decode(file_get_contents('php://input'),true);
			echo ($objpub_controller->setQuery($method,$input));
		}
		
		// Contacting the regions table
		if($routes[0] == 'regions')
		{
			
			$input = json_decode(file_get_contents('php://input'),true);
			echo ($objreg_controller->setQuery($method,$input));
		}
		
		
		// Contacting the sales table
		if($routes[0]=="sales")
		{
			// Checking to see if a game title is given
			if(isset($routes[1]))
			{
				if(preg_match('/[a-z]*/',$routes[1]))
				{
					// Checking to see if a release date is given
					if (isset($routes[2]))
					{
						if(preg_match('/[0-9]*/', $routes[2]))
						{
							// Checking to see if a price is given
							if(isset($routes[3]))
							{
								if(preg_match('/[0-9]*/', routes[3]))
								{
									if(isset($routes[4]))
									{
										if(isset($routes[5]))
										{
											$objsales_controller->setParameters($routes);
										}
										else
										{
											$objsales_controller->setParameters($routes);
										}
									}
									else
									{
										$objsales_controller->setParameters($routes);
									}
									
								}
							}
							else
							{
								$objsales_controller->setParameters($routes);	
							}	
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
		
		// Contacting the systems table
		if($routes[0] == 'systems')
		{
			
			$input = json_decode(file_get_contents('php://input'),true);
			echo ($objsys_controller->setQuery($method,$input));
		}
		
	}
?>