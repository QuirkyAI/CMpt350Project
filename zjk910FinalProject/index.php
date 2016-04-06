<!-- Creation of the Index page, which will act as the access point. -->

<head>
	
</head>

<?php
	session_start();
	if (isset($_GET['controller']) && isset($_GET['action']))	{
			$controller	= $_GET['controller'];
			$action		= $_GET['action'];
		}
		else {
			$controller	= 'pages';
			$action		= 'home';
		}
	include('views/layout.php');
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
		<style>
			body {
				background-image: url("https://awesomewallpapers.files.wordpress.com/2015/04/games-8.jpg");
				background-color: #cccccc;
				height: 100%;
			}
		<style>
	</head>
	<body>

	</body>
</html>
