<?php
  require_once("header.html");
  session_start();

  ini_set('display_errors', 'On');
  error_reporting(E_ALL);

  if(isset($_SESSION['UserName']) && $_SESSION['UserName'] != null){

  echo "<h2> You have successfully logged out!</h2>";

  session_unset();
  session_destroy();
  }
  else {
    echo "<h2>You have already logged out!</h2>";
    }
?>