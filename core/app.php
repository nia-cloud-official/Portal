<?php

namespace App;

class App
{
    public $conn;
    private $username;
    private $user_id;
    private $password;

    public function __construct()
    {
        $conn = mysqli_connect("localhost", "root", "", "portal");
        $this->conn = $conn;
    }
    public function Login($username, $password)
    {
        $loginQuery = "SELECT * FROM `users` WHERE `username` = '$username'";
        $result = mysqli_query($this->conn, $loginQuery);
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_array($result);
            if ($user["password"] == $password) {
                $this->user_id = $user['id'];
                $this->username = $user['username'];
                $this->password = $user['password'];
                if ($user['role'] == 'super') {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    header("Location: ./../views/super_admin/index.php");
                }
                else if ($user['role'] == 'admin') {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    header("Location: ./../views/admin/index.php");
                } else {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    header("Location: ./../views/user/index.php");
                }
            } else {
                $row = null;
                echo "User Account not found!";
            }
        }
    }
    public function addUser($username,$email,$password,$role){
        if(!$password){ 
           $password = $this->generatePassword(12);
           echo "Here is the Password we Generate <b>" . $password . "</b>";
        }
        $addUQuery = "INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES (NULL, '$username', '$password', '$role')";
        mysqli_query($this->conn, $addUQuery);
        echo "User Added";
        return true;
    }
    public function generatePassword($length = 12) {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';
        $allChars = $uppercase . $lowercase . $numbers . $specialChars;
        $password = '';
        $password .= $uppercase[random_int(0, strlen($uppercase) - 1)];
        $password .= $lowercase[random_int(0, strlen($lowercase) - 1)];
        $password .= $numbers[random_int(0, strlen($numbers) - 1)];
        $password .= $specialChars[random_int(0, strlen($specialChars) - 1)];
        for ($i = 4; $i < $length; $i++) {
            $password .= $allChars[random_int(0, strlen($allChars) - 1)];
        }
        return str_shuffle($password);
    }

    public function switchRole($session_username) { 
        $switchRQuery = "SELECT * FROM `users` WHERE `username` = '$session_username'";
        $result = mysqli_query($this->conn, $switchRQuery);
        if (mysqli_num_rows($result) > 0){ 
            $user = mysqli_fetch_array($result);
            if ($user['role'] == 'super') {
                $_SESSION['username'] = $user['username'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header("Location: views/super_admin/index.php");
            }
            if ($user['role'] == 'admin') {
                $_SESSION['username'] = $user['username'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header("Location: views/admin/index.php");
            } else {
                $_SESSION['username'] = $user['username'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header("Location: views/user/index.php");
            }
        }else { 
            echo "OH GOOD LORD, SOMETHING WENT WRONG CALL TIMOTHY OR SOMETHING! 🤷‍♂️";
        }
    }
}
