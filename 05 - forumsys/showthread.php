<?php
//start session
session_start();
//connection stuff goes here:
include("./db.php");
DB::connect();

/* Lists all posts for this thread */
function list_posts($id)
{
	$threadid = $id;
	$conn = DB::$connection;
    $sql = "SELECT postbody, userid FROM posts WHERE threadid = '$threadid' ORDER BY date";
    $query = $conn->query($sql);
    return $query->fetchAll();
    }

/* When provided with a $userid, returns its username */
function get_username($userid){
	$conn = DB::$connection;
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT username FROM users WHERE userid = :userid");
    $stmt->bindParam('userid', $userid);
    $stmt->execute();
    $query = $stmt->fetch();
    return $query;
}

/*Gets thread title*/
function getThreadTitle(){

	$db = DB::$connection;
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

    $sql = 'SELECT title,date FROM threads WHERE threadid = :threadid';
    $query = $db->prepare($sql);
    $query->bindparam(':threadid', $_GET["threadid"]);
    $query->execute();
    return $query->fetchAll();
    }

getThreadTitle();

?>

<html>
<head>
  <link rel="stylesheet" href="style.css">
	<title>
		<?php foreach(getThreadTitle() as $row){
			echo $row[0] . " - InacioForum";
		}?>
	
	</title>
</head>
<body>
	<div id='showthreadlist'><a href="/naciforum/threadlist.php">Show all threads</a></div>
	
	<div id='trd-main-container'>

	<div id='trd-title'><?php foreach(getThreadTitle() as $row){
			echo $row[0];
		}?>
	</div>	

	<!-- Starts PHP block for posts -->
	<?php
		/*Posts all posts in this thread*/
	foreach(list_posts($_GET["threadid"]) as $row){
		echo "<div class='trd-post-container'>";
		echo "<div class='trd-post-username'>" . get_username($row[1])[0] . " posted: </div>";
		echo "<div class='trd-post-body'>" . $row[0] . "</div>";
		echo "</div>";
		/*Gets username using the get_username() function and our "posted by" userid*/
		
	};
	?>
	<!-- Ends PHP block for posts -->

	<br/>
	

 	<!-- Quick reply inside threads, IF logged in!  -->
	<?php
		if(isset($_SESSION['currentUser'])){
			echo "

	<div class='formpage'>
	<form action='postreceive.php'  method='post'>
	
	<input name='threadid' type='hidden' value='"?>
	<?php echo htmlspecialchars($_GET["threadid"], ENT_QUOTES); ?>

	<?php echo "
	'> 
	<div id='qik-rply-container'>
	<div id='qik-rply-text'>Quick reply:</div><br/>
	<textarea name='postbody'></textarea>"; ?>
	
	<?php 
		echo "<input type='hidden' name='userid' value='" . 
		htmlspecialchars($_SESSION['currentUser'], ENT_QUOTES) . 
		"'>
	<div id='qik-rply-button'><input type='submit'></div>
	</form>
	</div>";}		 
	?>
	</div>

</body>
</html>