<html>
<head><link rel="stylesheet" href="styles.css"></head>
<body>


<div id='content'>

	<div id='sidebar-left'>
		<img src="http://i.imgur.com/0sVZTVy.png">
		<div class='sidebar-button' id='home'><a href="/blogsys/index.php">Home</a><br/><br/></div>
		<div class='sidebar-button' id='submit'><a href="/blogsys/submit.php">Submit</a><br/><br/></div>
		<div class='sidebar-button' id='login'><a href="/blogsys/login.php">Login</a><br/><br/></div>

	</div>
	
	<div class='formpage'>
		<form action="postreceive.php" method="post">
		<div class='sidebar-button'>Title:</div><br/>

		<input type="text" name="title"><br/><br/>

		<div class='sidebar-button'>Post body:</div><br/>
		<textarea name="postbody"></textarea><br/><br/>
		
		<input type="submit">
		</form>
	</div>

</div>



</body>
</html>