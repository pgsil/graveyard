<?php
//start session
session_start();
//initialize db connection
include("./db.php");
DB::connect();


//inserts into table blog_post
function createThread() {
	//create thread
	echo $_POST["title"] . "<br/>";
	$db = DB::$connection;
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

	$sql = "INSERT INTO threads(title,userid,date) VALUES (?,?,NOW())";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(htmlspecialchars($_POST["title"]),$_SESSION['currentUser']));
	$trd_id = $db->lastInsertId();
	echo $trd_id;

	// post to thread
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );


	$threadid = $trd_id;
	$postbody = $_POST["postbody"];
	$userid = $_SESSION['currentUser'];

	// post to thread
	$sql = 'INSERT INTO posts(threadid,postbody,userid,date) VALUES(?,?,?,NOW())';
	$stmt = $db->prepare($sql);
	$stmt->execute(array(htmlspecialchars($threadid),($postbody),($userid)));
	return $trd_id;
}

$threadid = createThread();
header("Location: http://localhost/forumsys/showthread.php?threadid=$threadid");

?>



