<?php
  session_start();
?>


<h1>THIS IS THE SUPER ADMIN DASHBOARD LOL!</h1>
<h2>HEY THERE <?php echo $_SESSION['username']; ?></h2>

<a href="adduser.php">Add new User</a>