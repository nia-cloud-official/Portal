<?php
include "./../core/app.php";

use App\App;
session_start();
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $app = new App(); 
    $app->Login($username, $password);
}
?>

<body>
    <form action="?login" method="post">
        <input type="text" name="username" id="" />
        <input type="text" name="password" id="" />
        <button type="submit">Login</button>
    </form>
</body>

</html>