<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_demo.php");
    exit;
}
?>

<?php
  if(isset($_POST["id"]) && !empty($_POST["id"])){
      require_once "config_demo.php";

      $sql = "select * from employees where name= ?";

      if($stmt = $mysqli)
  }
