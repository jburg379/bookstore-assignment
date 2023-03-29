<?php

   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
   
   require_once("header.html");
   
   session_start();
   
   if(!isset($_SESSION['CustomerID'] )) {
     echo " <h2> Log In to create an order </h2> "; 
	 }
 
   else {
     if(! isset($_SESSION['BookID'])) {
        $_SESSION['title'] = array();
        $_SESSION['BookID'] = array();
        $_SESSION['quantity'] = array();
        $_SESSION['linetotal'] = array();
        $_SESSION['tax'] = array();
     }
	
      $title = $_POST['title'];
      $bookID = $_POST['BookID'];
      $price = $_POST['price'];
      $quant = $_POST['quantity'];
      $tax = ($price * $quant * 0.06);
      $booktotal = ($price*$quant);
      $bool=false;
	
      for($i=0; $i < count($_SESSION['BookID']); $i++) {
        if($_SESSION['BookID'][$i] == $bookID) {
          $bool = true;
          $_SESSION['quantity'][$i] = ($_SESSION['quantity'][$i]+$quant);
          $_SESSION['tax'][$i] = ($_SESSION['tax'][$i]+$tax);
          $_SESSION['linetotal'][$i] = ($_SESSION['linetotal'][$i]+$booktotal);
        }
      }
      if($bool==false) {
        array_push($_SESSION['title'], $title);
        array_push($_SESSION['linetotal'], $booktotal);
        array_push($_SESSION['BookID'], $bookID);
        array_push($_SESSION['quantity'], $quant);
        array_push($_SESSION['tax'], $tax);
      }
      header("Location:showCart.php"); 
    }
	?>