<?php
//start session
session_start();
//connection stuff goes here:
include("./db.php");
DB::connect();
?>
<!-- When provided with a $userid, returns its username -->
<?php function get_username($userid){
	$conn = DB::$connection;
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT username FROM users WHERE userid = :userid");
    $stmt->bindParam('userid', $userid);
    $stmt->execute();
    $query = $stmt->fetch();
    return $query;
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Threadlist</title>
</head>
<body>

<div class="topheader">
<!-- Get current user login ID, if valid; else LOGIN NOW! -->
<?php
	if(isset($_SESSION['currentUser'])){
		echo "<div class='login-info'><span>Logged in as: <br/>" . get_username($_SESSION['currentUser'])[0]  . "</span></div>"; 
	 }
	 else{
		echo "<div class='login-button'><a href='http://localhost/forumsys/login.php'>Login Now!</a></div>";
	 }
 ?>
</div>
 <br/><br/>

<div id='container'>

<!--  If logged in show the create new thread button  -->
<?php
	if(isset($_SESSION['currentUser'])){
		echo "<div class='newthread-button'><a href='/forumsys/newthread.php'><b>Create new thread</b></a></div><br/><br/>"; 
	 }
 ?>


<!-- List threads -->
<?php
function list_tables()
{
	$conn = DB::$connection;
    $sql = 'SELECT threadid, title,date, userid FROM threads ORDER BY date DESC';
    $query = $conn->query($sql);
    return $query->fetchAll();
    }

foreach(list_tables() as $row){
	echo "<div class='threadlist-element'>
			<div class='thread-title'><a href='/forumsys/showthread.php?threadid=". $row[0] . "'>" . $row[1] . "</a></div>
			<div class='thread-postedby'>posted by:</br>" . get_username($row[3])[0] . "</div>" . 
			"</div>";
}
?>

</div>
</body>
</html>