<?php

  require_once("header.html");
  
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);

  $db = new PDO("sqlite:bookstore.db");

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password =  $_POST['password'];
  $phone = $_POST['phone1']. $_POST['phone2']. $_POST['phone3'];

  $query = "SELECT * FROM Customers WHERE Email=?";
  $result = $db->prepare($query);
  $result->execute(['$email']);
  $row = $result->fetch();
  

  if(!$row) {
    $queryc = "INSERT INTO Customers (UserName, Email, Passwd, PhoneNumber)
               VALUES ('$username', '$email', '$password', '$phone')";
    $resultc = $db->query($queryc);

    echo "<h2>Account created for $username!</h2>";
    }
  else {
    echo "<h2> Account has already been created with this email address!</h2>";
    }

?>
    