<html>
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
			
			.col-box {width: 100%;}
			
			.header {
				background-color: #3300CC;
				color: #ffffff;
				padding: 0.5em;
			}
			
			.body {
				background-color: #FFFF00;
				padding: 0.5em;
			}
			
			.footer {
				background-color: #E00000;
				color: #ffffff;
				padding: 0.5em;
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
			
			p.footer {
				font-family: Arial, Helvetica, sans-serif;
				font-size: 1.000em;
				text-align: center;
				font-style: italic;
			}
			
			h1{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 1.875em;
				font-weight: bold;
				font-style: italic;
				font-variant: small-caps;
				text-align: center;
			}
			
			body {
				font-size: 100%;
			}
			
			figure {
				text-align: center;
			}
			.form {
				
				color: #ffffff;
				padding: 2em;
				text-align: left;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 1em;
				text-align: left;
			}
			
			div[back-img]{
				width: 100%;
				height: 100%;
			}
			
		</style>
		<script>
		var app = angular.module('app',[]);
		app.controller('ctrl', function($scope){
		});


		app.directive('backImg', function(){
			return function(scope, element, attrs){
				var url = attrs.backImg;
				element.css({
					'background-image': 'url(' + url +')',
					'background-size' : 'cover'
				});
			};
		});
		</script>	
	</head>
 
  <body>
	<div back-img="https://awesomewallpapers.files.wordpress.com/2015/04/games-8.jpg">
    <header>
		<?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
			<!-- Create the menu -->
			<ul>
				<li><a href='?controller=pages&action=home'>Home</a></li>
				<li><a href='?controller=pages&action=add'>Add</a></li>
				<li><a href='?controller=pages&action=read'>Read</a></li>
				<li><a href="../../logout.php">Logout</a></li>
			</ul>
		<?php endif ?>
		
    </header>
    
	<div class="header">
		<div class="row">
			<div class="col-box">
				<h1>Zak Knippel's Video Game Industry Database</h1>
				<!-- Insert the data given from the API -->
				<p class="sansserrif" id="descriptor"></p>
			</div>
		</div>
	</div>
	
	<div class="body">
		<div class="row">
			<div class="col-box">
				<?php include('routes.php'); ?>
			</div>
		</div>
	</div>
	
	<footer>
		<div class="footer">
			<div class="row">
				<div class="col-box">
					<p><figure>
					<p class="footer">Copyright: Zachary Knippel</p>
					</p>
				</div>
			</div>
		</div>
	</footer>
	</div>
  </body>
<html>

