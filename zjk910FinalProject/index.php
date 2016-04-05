<!-- Creation of the Index page, which will act as the access point. -->


<?php
	session_start();
	if (isset($_GET['controller']) && isset($_GET['action']))	{
			$controller	= $_GET['controller'];
			$action		= $_GET['action'];
		}
		else {
			$controller	= 'pages';
			$action		= 'login';
		}
	include('views/layout.php');
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
<link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> 
 </head>
  <body>
	
  </body>
</html>
