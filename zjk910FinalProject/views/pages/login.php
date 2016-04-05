<?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->

<?php else: ?>     <!-- Before login --> 
		<div class="container">
		<h1>Login with Facebook</h1>
				   Not Connected
		<div>
			  <a href="fbconfig.php">Login with Facebook</a></div>
			  </div>
<?php endif ?>