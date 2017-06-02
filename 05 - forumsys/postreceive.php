<?php
//start session
session_start();
//initialize db connection
include("./db.php");

DB::connect();


//inserts into table blog_post
function postToThread() {
	$db = DB::$connection;
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );


	$threadid = $_POST["threadid"];
	$postbody = $_POST["postbody"];
	$userid = $_POST["userid"];

	// post to thread
	$sql = 'INSERT INTO posts(threadid,postbody,userid,date) VALUES(?,?,?,NOW())';
	$stmt = $db->prepare($sql);
	$stmt->execute(array(htmlspecialchars($threadid),nl2br(($postbody)),($userid)));
	return $threadid;
}

$threadid = postToThread();
header("Location: http://localhost/forumsys/showthread.php?threadid=$threadid");

?>



