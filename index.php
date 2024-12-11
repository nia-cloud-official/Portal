<?php 
include "./core/app.php";

use App;
session_start();
const App = new App\App;
App->__construct();
if(isset($_SESSION['username'])){
  $session_username = $_SESSION['username'];
  App->switchRole($session_username);
}else{
  header("Location: ./auth/login.php");
}
