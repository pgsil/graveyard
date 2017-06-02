<?php
session_start();
?>



<!-- Formstuff for login -->
<form action="/blogsys/dologin.php" method="POST">
  Username:<br>
  <input type="text" name="username" /><br>
  Password:<br>
  <input type="password" name="password" /><br><br>
  <input type="submit" value="Login">
</form>


Formstuff for account creation
<b>No account? Make one, buddy:</b>

<form action="/blogsys/register.php" method="POST">
  Username:<br>
  <input type="text" name="username_new" value=""><br><br>
  Password:<br>
  <input type="text" name="password_new" value=""><br><br>
   Repeat password:<br>
  <input type="text" name="password_new2" value=""><br><br>
  <input type="submit" value="Submit">
</form>
