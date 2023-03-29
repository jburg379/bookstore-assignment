<?php

  require_once("header.html");
  error_reporting(E_ALL);


  //Connect to the database
  $db = new PDO("sqlite:bookstore.db");


  $catID = $_GET['catID'];


   // Select all categories in database

  $queryb = "SELECT b.Title, b.AuthorID, b.BookID, c.CategoryName, a.AuthorName FROM Books b join Authors a on(b.AuthorID=a.AuthorID) join categories c on (c.CategoryID=b.CategoryID) WHERE b.CategoryID=$catID";
  $resultb = $db->query($queryb);
  $row = $resultb->fetch(PDO::FETCH_ASSOC);

  if (!$resultb)
  {

    echo "<p>There are no categories of products in the database!<br><br>";

  } // end if

  else
  {

    echo $CategoryName=$row['CategoryName'];

     // loop over the books
    echo "
      <table>
        <tr>
          <th>Book Name</th>
          <th>Author Name</th>
        </tr>";

    while ($row = $resultb->fetch(PDO::FETCH_ASSOC))
    {
       $BookTitle = $row['Title'];
       $AuthorID = $row['AuthorID'];
       $BookID = $row['BookID'];
       $AuthorName=$row['AuthorName'];

       echo "
         <tr>
           <td><a href='bookInfo.php?BookId=$BookID'>$BookTitle</a></td>
           <td>$AuthorName</td>
         </tr>";

     } // end while

    echo "</table>";

  } // end else

  $db = null;


  require_once ("footer.html");

?>