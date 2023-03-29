<script>
function checkinput(e) {
	var text="";
	if((document.getElementById("number").value =="") || 
	(document.getElementById("number").value <= "0")) {
		text="Add the quantity of books you want\n Quantity must be greater than 0";
	}
	if(text=="") { return true;}
	else {
		alert("check the following: \n" +text);
		e.preventDefault();
	}
}

window.addEventListener("submit", checkinput);

</script>

<pre>
<?php

  if($_SERVER['REQUEST_METHOD']==='POST'){

  print_r($_POST);
  exit;

  }
?>
</pre>
<?php
  require_once("header.html");

  ini_set ('display_errors', 1); 
  error_reporting (E_ALL);

   //Connect to the database (defined in bookstore.db)
  $db= new PDO("sqlite:bookstore.db");

  $BookID = $_GET['BookId'];
  $query = "SELECT b.Title, b.AuthorID, b.CategoryID,b.YEAR, b.Rating, b.ISBN, b.ISBN13, b.  Price, b.Image,
  a.AuthorName,c.CategoryName FROM Books b
  join Authors a on(b.AuthorID=a.AuthorID)
  join categories c on (c.CategoryID=b.CategoryID) WHERE BookID = $BookID";
  $result = $db->query($query);
  $row = $result->fetch();
  $BookTitle =$row['Title'];
  $AuthorID =$row['AuthorID'];
  $CategoryID =$row['CategoryID'];
  $Year =$row['Year'];
  $Rating =$row['Rating'];
  $ISBN =$row['ISBN'];
  $ISBN13 =$row['ISBN13'];
  $Price =$row['Price'];
  $Image =$row['Image'];
  $AuthorName=$row['AuthorName'];
  $CategoryName=$row['CategoryName'];

?>

  <h2><?=$BookTitle?></h2>
  <p><em>By:<?=$AuthorName?></em></p>

  <table>
    <tr><td rowspan=6><img src='<?=$Image?>' alt='loading..' /></td></tr>
    <tr><td>Category:<?=$CategoryName?></td></tr>
    <tr><td>Year: <?=$Year?></td></tr>
    <tr><td>Rating: <?=$Rating?></td></tr>
    <tr><td>ISBN: <?=$ISBN?></td></tr>
    <tr><td>ISBN13: <?=$ISBN13?></td></tr>
    <tr>
      <td colspan ="3";>
      <form action="addToCart.php" name='frm_submit' method='post'>
       <input type='hidden' name='BookID' value='<?=$BookID?>'>
       <input type='hidden' name='title' value='<?=$BookTitle?>'>
       <input type='hidden' name='price' value='<?=$Price?>'>
       <strong>Price $<?=$Price?><br>Quantity:<input id="number" type='number' name='quantity' value=''></strong>
       <input type='submit' value='Add to Cart'>
      </form>
     </td>
   </tr>

</table>