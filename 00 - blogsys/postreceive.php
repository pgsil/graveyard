<?php
//initialize db connection
include("./db.php");
DB::connect();

//inserts into table blog_post
function insertPost() {
	$sql = 'INSERT INTO blog_post(title,postbody) VALUES(?,?)';
	$stmt = DB::$connection->prepare($sql);
	$stmt->execute(array(htmlspecialchars($_POST["title"]),htmlspecialchars($_POST["postbody"])));
}

echo insertPost();

?>

<html>
<head><link rel="stylesheet" href="styles.css"></head>
<body>
<div id='content'>

	<div id='sidebar-left'>
		<img src="http://i.imgur.com/0sVZTVy.png">
		<div class='sidebar-button' id='home'><a href="/blogsys/index.php">Home</a><br/><br/></div>
		<div class='sidebar-button' id='submit'><a href="/blogsys/submit.php">Submit</a><br/><br/></div>
		<div class='sidebar-button' id='login'><a href="/blogsys/login.php">About</a><br/><br/></div>

	</div>

	<div id='main'>
		
		<div class="test">
		<div class="titlerice">
		Your Post:<br/>
		<b><?php echo htmlspecialchars($_POST["title"]); ?></b></div><br/>

		<?php echo htmlspecialchars($_POST["postbody"]); ?></div>

	<div class="goBackButton">
		<a href="/blogsys/index.php"><- We have to go back.</a>
	</div>

</div>


</body>
</html>

