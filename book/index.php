<?php

include 'book.php';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOOK CLASS</title>
</head>
<body>
  <form method="post">
    <input type="text" name="book_title" placeholder="Enter Book Title"> <br>
    <input type="text" name="book_author" placeholder="Enter Book Author"> <br>
    <input type="number" name="book_price" placeholder="Enter Book price"> <br>
    <input type="submit" name="btn_submit">
  </form>
    <?php

    if(isset($_POST['btn_submit'])){
      //collect data
      $book_title = $_POST['book_title'];
      $book_author = $_POST['book_author'];
      $book_price = $_POST['book_price'];
      

      //create the object

      $b1 = new Book;

      $b1->setTitle($book_title);
      $b1->setAuthor($book_author);
      $b1->setPrice($book_price);
      

      echo "<table border=1>
              <tr>
                 <th> Book Title </th>
                 <th> Author </th>
                 <th> Price </th>
              </tr>
              <tr>
                 <td>" .$b1->getTitle() ."</td>
                 <td>" .$b1->getAuthor() ."</td>
                 <td>" .$b1->getPrice() ."</td>
              </tr>
            </table>";
    }

?>
  
</body>
</html>