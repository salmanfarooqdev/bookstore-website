
<?php
// database connection
$servername = "localhost";
$username = "root";
$passworddb = "";
$database = "bookstore";

$con = mysqli_connect($servername,$username,$passworddb,$database);

if(!$con)
{
    die("Error connecting to database: " . mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Classic Books</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
        <?php include "index.css" ?>

  </style>
</head>
<body>


  <div class="container">
    <div class="header">
      <div class="name"> <h1>Reader's Palace</h1></div>
      <div class="search-area"><input type="search" name="" id="" placeholder="Search..."> 
        
      </div>
      <div class="vl2"></div>
      
      <a href="cartp.php"><i class="fa fa-shopping-cart" style="font-size:28px; color: aliceblue; position: relative; top:20px;right:65px;"></i>
      <span class="cart">Cart</span> </a> 
      
      <div class="vl"></div>
      <!-- <a href="login.php">
      <i class="fa fa-user-circle" style="font-size:28px;color: aliceblue; position: relative; top:22px;right:35px; "></i>
    </a> -->

    <div class="dropdown">
    <i class="fa fa-user-circle" style="font-size:28px;color: aliceblue; position: relative; top:22px;right:35px;"></i>
    <div class="dropdown-content">
        <a href="login.php">Log In</a>
        <a href="signup.php">Register</a>
        <a href="#">Log Out</a>
    </div>
</div>






    </div>
    <div class="content">
      <div class="group">
        <div class="side-bar">
          <div class="menu">
            
              <div class="menudiv"> <a href="index.php">Home</a> </div>
              <div class="menudiv"><a href="about.php">About Us</a> </div>
              <div class="menudiv"> <a href="contact.php">Contact Us</a> </div>
             
          </div>
          <div class="categories">
            <span class="categ">Categories</span> 
            <ul>
              <li><a href="fiction.php" target="_blank" >Fiction</a></li>
                  <li><a href="non-fiction.php"  target="_blank">Non-Fiction</a></li>
                  <li><a href="classics.php"  target="_blank">Classics</a></li>
                  <li><a href="thrillers.php"  target="_blank">Thrillers</a></li>
            </ul>
          </div>
        </div>
        <div class="main-area">
          <div class="page-name"> <h1>Classic Books</h1></div>
          <div class="page-content"> <!--inside here-->
            <div class="title">Classic Books</div>

                <div class="book-div">


                  <?php 
                  $category = "Classic";
                  $query = "SELECT * FROM books WHERE category = '$category'";
                  $result = mysqli_query($con, $query);

                  while ($book = mysqli_fetch_assoc($result)) 
                  {
                    $bookId = $book['Id'];
                    $bookName = $book['bookName'];
                    $bookAuthor = $book['authorName'];
                    $price = $book['price'];
                    $image = $book['bookImage'];


                      echo '<div class="books">';
                      echo  '<div class="book-image"> <a href="book-description.php?Id=' . $bookId .'"><img src="' . $image .'" alt=""></a> </div>';
                      echo  '<div class="book-title">'. $bookName .'</div>';
                      echo   '<div class="book-author">'. $bookAuthor .'</div>';
                      echo '</div>';
                      
                  }

                  mysqli_close($con);
                  ?>
              </div>

          

          </div>
         
        </div>
      </div>
    </div>
    <div class="footer">
        <h2>Footer</h2>
    </div>
  </div>
  
</body>
</html>