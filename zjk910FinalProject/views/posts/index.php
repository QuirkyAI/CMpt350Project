
<script language="javascript" type="text/javascript">
	window.onload = function(){
	//Storing the data retrieved from the database in a variable
	var array_posts=<?php echo json_encode($posts); ?>;

	var ul = document.getElementById("posts_list");
	for (var i = 0, len = array_posts.length; i < len; i++) {

		//Creating an anchor element to add to the list
		var a = document.createElement("a");
		a.textContent = array_posts[i].firstname;
		a.setAttribute('href', "?controller=posts&action=show&id="+ array_posts[i].id);

		//Creating a new item to add to the list
		var li = document.createElement("li");
		li.appendChild(a);
		ul.appendChild(li);
	}
}
</script>


<DOCTYPE html>
<html>
  <head>
      <title>MVC Example for The Web</title>
  </head>
  <body>
    <header>
    	<p>Here is a list of all posts:</p>
    </header>
    <ul id="posts_list"></ul>
  </body>
</html>