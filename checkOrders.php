<?php
  require_once("header.html");

  ini_set ('display_errors', 1); 
  error_reporting (E_ALL);
  
  session_start();
  
  $db= new PDO("sqlite:bookstore.db");
  
  if(!isset($_SESSION['CustomerID'] )) {
     echo " <h2> Log In to check order </h2> "; 
	 }
 
   else {
	   
	 $cusname=$_SESSION['UserName'];
     $customerID=$_SESSION['CustomerID'];
  
    $query = "SELECT OrderID, BookCost, Tax, Total, OrderDate FROM Orders WHERE CustomerID='$customerID'";
    $result = $db->query($query);
  
    echo "<h2>{$_SESSION['UserName']} - Your Orders</h2>
        <table width=60%>
          <tbody>
		    <th>Order Number</th>
		    <th>Order Date</th>
		    <th>Book Total</th>
		    <th>Tax</th>
		    <th>Grand Total</th>";
  
    while($row = $result->fetch()) {
	  $orderID=$row['OrderID'];
      $cost=$row['BookCost'];
	  $tax=$row['Tax'];
	  $total=$row['Total'];
	  $date=$row['OrderDate'];
	  $btax = round($tax, 2);
	  $btot = round($total, 2);
	  
      echo "
          <tr>
            <td><a href= 'checkOrderDetails.php?&orderID=$orderID'>$orderID<a/>
			<td>$date</td>
			<td>$$cost</td>
			<td>$$btax</td>
			<td>$$btot</td>";
        
  }
  
  echo "</tbody>
      </table>
      <br>";
   }
  $db= null;  

 require_once("footer.html"); 
?>