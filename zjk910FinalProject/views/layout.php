<html>
	<?php error_reporting(E_ALL & ~E_NOTICE);  ?>
	<head>
		
		<!-- Place my name in the title -->
		<title>Video Game Industry Database</title>
	
		<style>
			
			* {
				box-sizing: border-box;
			}
			
			.row:after {
				content: "";
				clear: both;
				display: block;
			}
			
			[class*="col-"] {
				float: left;
				padding: 0.5em;
			}
			
			.col-box {
				width: 100%;
				padding: 0.5em;
				font-size: larger;
				font-weight: bold;
			}
			
			.header {
				position: relative;
				background: rgb(51,0,204);
				background: rgba(51,0,204,0.7);
				color: #ffffff;
				padding: 0.5em;
				margin-left: auto;
				margin-right: auto;
			}
			
			.box	{
				margin-top: 1em;
				margin-bottom: 1em;
				margin-left: 3em;
				margin-right: 3em;
			}
			
			.body {
				position: relative;
				background: rgb(255,255,0);
				background: rgba(255,255,0,0.8);
				background-size: 90% auto;
				padding-left: 2.0em;
				margin-left: auto;
				margin-right: auto;
			}
			
			.footer {
				position: relative;
				background: rgb(255,0,0);
				background: rgba(255,0,0,0.7);
				color: #ffffff;
				padding: 2.0em;
				margin-left: auto;
				margin-right: auto;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 1.000em;
				text-align: center;
				font-style: italic;
				position: relative;
			}
			
			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #222;
			}

			li {
				float: left;
			}

			li a {
				display: inline-block;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
			}

			li a:hover {
				background-color: #A00;
			}
			
			IMG.displayed {
				display: block;
				margin-left: auto;
				margin-right: auto;
			}
			
			p.sansserrif {
				font-family: Arial, Helvetica, sans-serif;
				font-size: 0.875em;
			}
			
			h1{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 1.775em;
				font-weight: bold;
				font-style: italic;
				font-variant: small-caps;
				text-align: center;
			}
			
			body {
				font-size: 150%;
			}
			
			figure {
				text-align: center;
			}
			.form {
				background: rgb(102,51,204);
				background: rgba(102,51,204,0.7);
				color: #ffffff;
				padding: 2em;
				text-align: left;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 1em;
				
			}
			
			body {
				background-image: url("https://awesomewallpapers.files.wordpress.com/2015/04/games-8.jpg");
				background-color: #cccccc;
				height: 100%;
				width: 100%;
				background-position:70% 0%;
				background-repeat: no-repeat;
				background-attachment: fixed;
			}
			
			.card {
				background: rgb(102,51,204);
				background: rgba(102,51,204,0.7);
				padding: 0.5em;
				text-align: left;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 1.30em;
				text-align: center;
				font-style: italic;
			}
			
		</style>
	</head>
 
	<body>
		<header>
			<?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
				<!-- Create the menu -->
				<ul>
					<li><a href='?controller=pages&action=home'>Home/About Us</a></li>
					<li><a href='?controller=pages&action=add'>Add</a></li>
					<li><a href='?controller=pages&action=read'>Read</a></li>
					<li><a href="../../logout.php">Logout</a></li>
				</ul>
			<?php endif ?>
			
		</header>
		<div class="box">
			<div class="header">
				<div class="row">
					<div class="col-box">
						<h1>CMPT 350 - Video Game Industry Database</h1>
						<!-- Insert the data given from the API -->
						<p class="sansserrif" id="descriptor"></p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="box">
			<div class="body">
				<div class="row">
					<div class="col-box">
						<?php include('routes.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</body>
	
	<footer>
		<div class="box">
			<div class="footer">
				<div class="row">
					<div class="col-box">
						<p><figure>
						<p style="font-size: 150%;">Copyright: Zachary Knippel & Connor Nettleton-Gooding</p>
						<br>
						<p>WEBSITE ADMINS:</p>
						<p>Zachary Knippel (zjk910@mail.usask.ca)</p>
						<p>Connor Nettleton-Gooding (cwn973@mail.usask.ca)</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
<html>

