<?php 

require_once("header.html");
  error_reporting(E_ALL);
  session_start();
  
  unset($_SESSION['title']);
  unset($_SESSION['BookID']);
  unset($_SESSION['quantity']);
  unset($_SESSION['tax']);
  unset($_SESSION['linetotal']);
  
  echo "<h2>Cart Cleared</h2>";
  
  require_once("footer.html");
  ?>