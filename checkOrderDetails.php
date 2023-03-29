<?php
  require_once("header.html");

  ini_set ('display_errors', 1); 
  error_reporting (E_ALL);
  
  $db= new PDO("sqlite:bookstore.db");

  $orderID=$_GET['orderID'];
   
  $query = "SELECT BookCost, Tax, Total, OrderDate FROM Orders WHERE OrderID='$orderID'";
  $result = $db->query($query);
  
  echo "<h2>Order Number: $orderID</h2>";
  
  while($row=$result->fetch()) {
      $cost=$row['BookCost'];
	  $tax=$row['Tax'];
	  $total=$row['Total'];
	  $date=$row['OrderDate'];
	  $btax = round($tax, 2);
	  $btot = round($total, 2);
	  
	   echo "<table width=40%>
              <tbody>
               <tr>
			    <th>Order Date:</th>
			    <td>$date</td>
			   </tr>
			   <tr>
			    <th>Cost:</th>
			    <td>$$cost</td>
			   </tr>
			   <tr>
			    <th>Tax:</th>
			    <td>$$btax</td>
			   </tr>
			   <tr>
			    <th>Total:</th>
			    <td>$$btot</td>
			   </tr>
				 </tr>";
				 
		echo "
        </tbody>
      </table>
      <br>";	
	  
		echo "<table width=60%>
                  <tbody>
				   <th>Title</th>
				   <th>ID</th>
				   <th>Quantity</th>
				   <th>Line Total</th>
				   ";
		
	   $query2 = "SELECT BookID, Quantity, LineTotal FROM OrderDetails WHERE OrderID='$orderID'";
       $result2 = $db->query($query2);
       
	   while($row2 = $result2->fetch()) {
       $bookID = $row2['BookID'];
	   
	   $linetotal= $row2['LineTotal'];
	   $quant=$row2['Quantity'];
	   
	   
	   
	   $query3 = "SELECT Title FROM Books WHERE BookID='$bookID'";
       $result3 = $db->query($query3);
	   while($row3 = $result3->fetch()) {
		   $title=$row3['Title'];
		   
		   echo "
				   <tr>
		            <td>$title</td>
					<td>$bookID</td>
					<td>$quant</td>
				    <td>$$linetotal</td>
				   ";
	   }
	   }
	echo "
        </tbody>
      </table>
      <br>
    ";
  }
  
  $db= null;  

 require_once("footer.html"); 
?>