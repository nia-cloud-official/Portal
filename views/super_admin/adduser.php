<?php
include "./../../core/app.php";

use App\App;

session_start();
const App = new App();
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    App->addUser($username, $email, $password, $role);
}

?>
<form action="" method="post" class="form">
    <p>
        Add New Users,
        <span>Yaay lets add some freaks in this shiiiii!</span>
    </p>
    <input type="text" placeholder="Username" name="username">
    <input type="email" placeholder="Email" name="email">
    <input type="password" placeholder="password" name="password">
    <select name="role" id="role">
    <option value="user">User</option>
    <option value="admin">Admin</option>
    <option value="super">Super Admin</option>
    </select>
    <button type="submit" class="oauthButton">
        Add New User
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m6 17 5-5-5-5"></path>
            <path d="m13 17 5-5-5-5"></path>
        </svg>
    </button>
</form>

<link rel="stylesheet" href="./../../public/app.css">

