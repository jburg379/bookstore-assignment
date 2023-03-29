<script>
function checkout(e) {
	if(!confirm("do you want to proceed to checkout?")) {
		e.preventDefault();
	}
}
window.addEventListener("submit", checkout);

</script>

<?php

  require_once("header.html");
  error_reporting(E_ALL);
  session_start();
 
  if(!isset($_SESSION['CustomerID'] )) {
    echo " <h2> Log In to create an order </h2> "; }
 
  else {
    if(isset($_SESSION['BookID'])&& $_SESSION['BookID']!= null) {
      echo "<h2>{$_SESSION['UserName']} - Your Cart </h2>";
      echo "<table class='center'> 
	          <tr>
			    <td> Title </td>
				<td>Quantity</td>
				<td>Book Total</td>
			  </tr>
			 ";
			  $subtot = 0;
			  $trax = 0;
	  for($n=0; $n < count($_SESSION['BookID']); $n++) {
	    echo "<tr> 
		        <td> " . $_SESSION['title'][$n] . "</td>
				<td> " . $_SESSION['quantity'][$n] . "</td>
				<td> $" . $_SESSION['linetotal'][$n] . "</td>
				</tr>";
	    $subtot = ($subtot + $_SESSION['linetotal'][$n]);
	    $trax = ($trax + $_SESSION['tax'][$n]);
		$btax = round($trax, 2);
	  }
        $total = ($subtot + $trax);
		$btot = round($total, 2);
?>
	
		<table class="center">
		  <tr>
		    <form action="checkout.php" name='frm_submit' method='post'>
		    <td>Subtotal: $<?=$subtot?></td></tr><br>
		    <td>Tax: $<?=$btax?></td></tr><br>
		    <td>Total: $<?=$btot?></td>
		  </tr>
		</table>
		<input type="submit" value="Checkout">
		</form>
<?php		
    }
  
  else{
echo " <h2> Empty Shopping Cart </h2> ";
}
  }
 
  require_once("footer.html");
?>