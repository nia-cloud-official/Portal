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

<style>
    /* From Uiverse.io by D3OXY */
    /* DEOXY Was Here */
    .form {
        --background: #d3d3d3;
        --input-focus: #2d8cf0;
        --font-color: #323232;
        --font-color-sub: #666;
        --bg-color: #fff;
        --main-color: #323232;
        padding: 20px;
        background: var(--background);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        gap: 20px;
        width: 300px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        box-shadow: 4px 4px var(--main-color);
    }

    .form>p {
        font-family: var(--font-DelaGothicOne);
        color: var(--font-color);
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
    }

    .form>p>span {
        font-family: var(--font-SpaceMono);
        color: var(--font-color-sub);
        font-weight: 600;
        font-size: 17px;
    }

    .separator {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .separator>div {
        width: 100px;
        height: 3px;
        border-radius: 5px;
        background-color: var(--font-color-sub);
    }

    .separator>span {
        color: var(--font-color);
        font-family: var(--font-SpaceMono);
        font-weight: 600;
    }

    .oauthButton {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        /* margin: 50px auto 0 auto; */
        padding: auto 15px 15px auto;
        width: 250px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 16px;
        font-weight: 600;
        color: var(--font-color);
        cursor: pointer;
        transition: all 250ms;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .oauthButton::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 0;
        background-color: #212121;
        z-index: -1;
        -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
        box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
        transition: all 250ms;
    }

    .oauthButton:hover {
        color: #e8e8e8;
    }

    .oauthButton:hover::before {
        width: 100%;
    }

    .form>input {
        width: 250px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 15px;
        font-weight: 600;
        color: var(--font-color);
        padding: 5px 10px;
        outline: none;
    }
    .form>select {
        width: 250px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 15px;
        font-weight: 600;
        color: var(--font-color);
        padding: 5px 10px;
        outline: none;
    }

    .icon {
        width: 1.5rem;
        height: 1.5rem;
    }
</style>