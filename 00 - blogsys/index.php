<?php
session_start();
//connection stuff goes here:
include("./db.php");
DB::connect();
function listPosts() {
    $sql = 'SELECT id, title, postbody FROM blog_post ORDER BY id';
    return DB::$connection->query($sql);
    }
?>

<html>
<head><link rel="stylesheet" href="styles.css"></head>
<body>

<div id='content'>

	<div id='sidebar-left'>
		<img src="http://i.imgur.com/0sVZTVy.png">
		<div class='sidebar-button' id='home'><a href="/blogsys/index.php">Home</a><br/><br/></div>
		<div class='sidebar-button' id='submit'><a href="/blogsys/submit.php">Submit</a><br/><br/></div>
		<div class='sidebar-button' id='login'><a href="/blogsys/login.php">
			<?php
				if(isset($_SESSION['login_user'])){
					echo "Logged in as: <br/>" . $_SESSION['login_user']; 
				 }
				 else{
					echo "Login Now!";
				 }
			?></a><br/><br/>

		</div>
	</div>
	
	<div id='main'>
		<?php foreach(listPosts() as $post): ?>
			<div class="test">
			<div class="titlerice">
			<b><a href="/blogsys/post.php?id=<?= $post['id']; ?>">
		    <?= $post['title']; ?>
		    </a></br></b></div>
		    <?= substr ($post['postbody'], 0, 140) . "... " ?>
		    <a href=/blogsys/post.php?id=<?=$post['id']; ?>> Continue reading</a>
		    </br></div>
		<?php endforeach; ?>
	</div>

</div>
</body>
</html>

