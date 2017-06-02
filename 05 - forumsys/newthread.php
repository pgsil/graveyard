<?php
//start session
session_start();
//connection stuff goes here:
include("./db.php");
DB::connect();
?>

<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div id='showthreadlist'><a href="/forumsys/threadlist.php">Go back</a></div>

<div id='trd-main-container'>


<div id='qik-rply-container' class="width100">

	<div class='formpage'>
		<form action="threadreceive.php" method="post">
		<div id='#qik-rply-text'>Title:</div><br/>

		<input type="text" name="title"><br/><br/>

		<div class='sidebar-button'>Post body:</div><br/>
		<textarea name="postbody"></textarea><br/><br/>
		
		<?php 
		echo "<input name='threadid' type='hidden' value='"?>
		<?php 
		echo htmlspecialchars($_SESSION['currentUser'], ENT_QUOTES); ?>
		<?php 
		echo "'>"; ?>

		<input type="submit">
		</form>
	</div>

</div>

</div>

</body>
</html>