<?php

  require_once("header.html");
  session_start();

  ini_set('display_errors', 'On');
  error_reporting(E_ALL);

  $db = new PDO("sqlite:bookstore.db");

  $email = $_POST['email'];
  $password = $_POST['password'];

  $queryb = "SELECT * FROM Customers WHERE Email='$email' AND Passwd = '$password' ";
  $result = $db->query($queryb);
  $row = $result->fetch();
  
  
  if(!$row) {
    echo "<h2>Incorrect account information</h2>";
    }
  else {
    $username = $row['UserName'];
    echo "<h2>Welcome $username to Joe's Books!</h2>";
    $customerID = $row['CustomerID'];
    $_SESSION['CustomerID'] = $customerID;
    $_SESSION['UserName'] = $username;
    }

?>