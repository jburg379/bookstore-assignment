<?php 

  require_once("header.html");
  ini_set ('display_errors', 1);
  error_reporting(E_ALL);
  
  session_start();
  
  $db = new PDO("sqlite:bookstore.db");
		 
	  $cost=array_sum($_SESSION['linetotal']);
	  $tax=array_sum($_SESSION['tax']);
	  $quantity=array_sum($_SESSION['quantity']);
	  $cusID=$_SESSION['CustomerID'];
	  $time=new DateTime();
	  $date=$time->format('Y-m-d H:i:s');
	  $total=($cost + $tax);
	  
	  $statement = "INSERT into Orders ('CustomerID', 'BookCost', 'Tax', 'Total', 'OrderDate') 
	                Values('$cusID', '$cost', '$tax', '$total', '$date')";
      $db->exec($statement);
      $query = "SELECT OrderID FROM Orders WHERE OrderID =(SELECT max(OrderID) FROM Orders) and CustomerID = '$cusID'";
      $result = $db->query($query);
      $row = $result->fetch();
      $OrderID = $row['OrderID'];
	  
	  for($i = 0; $i < count($_SESSION['BookID']); $i++){
        $bookID = $_SESSION['BookID'][$i];
        $quantity = $_SESSION['quantity'][$i];
        $linetotal = $_SESSION['linetotal'][$i];
        $statement2 = "INSERT into OrderDetails (OrderID, BookID, Quantity, LineTotal) Values ('$OrderID', '$bookID', '$quantity', '$linetotal')";
		$db->exec($statement2);
	  }
	  
	 unset($_SESSION['title']);
     unset($_SESSION['BookID']);
     unset($_SESSION['quantity']);
     unset($_SESSION['tax']);
     unset($_SESSION['linetotal']);
	 
	 echo "<h2>Order #$OrderID Confirmed</h2>";
 
 require_once("footer.html");
 ?>