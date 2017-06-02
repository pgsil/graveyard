<?php
//start session
session_start();

//connection stuff goes here:
include("./db.php");
DB::connect();

if(isset($_SESSION['login_user'])){          // Checking whether the session is already there or not if 
  header("Location: /blogsys/index.php");  // true then header redirect it to the home page directly
 }



// login function
function login($usr,$pwd){
  $postpwd = $_POST['password'];
  $postusr = $_POST['username'];

  $result = DB::$connection->prepare("SELECT * FROM accounts WHERE username= :hjhjhjh");
  $result->bindParam(':hjhjhjh', $usr);
  $result->execute();
  $users = $result->fetch(0);
  if(isset($users[2])){
    if (password_verify($postpwd, $users[2])) {
        echo "success";// valid login
        header("Location: /blogsys/index.php");
    } else {
        echo "pwd error";// invalid password
    }
  } else {
    echo "username error";// invalid username
    }
    
  }


if($_POST['username'] == '' || $_POST['password'] == ''){
    echo "User not found.";
    session_destroy();
    echo "<br/>Session terminated";
    header("location: /blogsys/index.php");
 }
else{
  login($_POST['username'], $_POST['password']) ;
}

?>