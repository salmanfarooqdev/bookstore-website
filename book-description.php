<?php


// database connection
$servername = "localhost";
$username = "root";
$passworddb = "";
$database = "bookstore";

$con = mysqli_connect($servername, $username, $passworddb, $database);

if (!$con) {
    die("Error connecting to database: " . mysqli_connect_error());
}



?>



<!DOCTYPE html>
<html>
<head>
    <title>Book Description</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .group{
      height: 950px;
  width: 100%;
  background-color: aliceblue;
  display: flex;
    }
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
        <a href="logout.php">Log Out</a>
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
              <div class="page-content"> <!--inside here-->

               <?php

                  $bookId = $_GET['Id'];

                  if (!empty($bookId)) {
                    
                    $sql = "SELECT * FROM books WHERE Id = $bookId";
                    $result = mysqli_query($con, $sql);

                   

                    

                    $book = mysqli_fetch_assoc($result);

                    $bookName = $book['bookName'];
                    $bookAuthor = $book['authorName'];
                    $price = $book['price'];
                    $image = $book['bookImage'];
                    $bookDesc =$book['bookDesc'];
                    $authorDesc = $book['authorDesc'];

                
                echo '<div class="book-desc">';
                echo' <div class="book-img"><img src="'. $image . '" alt=""></div>';
                echo'  <div class="book-detail">';
                echo'    <div class="bookdes-name">'. $bookName .'</div>';
                echo'    <div class="bookdes-author">'. $bookAuthor .'</div>';
                echo'    <div class="bookdes-price">Price: Rs.'. $price .'</div>';
?>
                <a href="addToCart.php?Id=<?php echo $bookId; ?>" class="add-cart" onclick="addToCart()">Add to Cart</a>

                <?php
                echo'  </div>';

                echo'</div>';

                echo'<hr color="grey">';

                echo '<div class="book-desc" id="bb">';
                 echo '<span id="bd">Book Description:</span>';
                 echo '<div class="book-description">' .$bookDesc.'</div>';
                echo '<br>';
                  echo '<span id="bd">About the Author:</span>';
                 echo '<div class="book-description">' .$authorDesc .'</div>';

               echo' </div>';

              }else{
                echo "<script>alert('book Id is empty');</script>";
              }
                
              mysqli_close($con);
              ?>

              </div>
             
            </div>
          </div>
        </div>
        <div class="footer">
            <p>&copy; 2023 Readers Palace. All rights reserved.</p>
        </div>
      </div>

      <script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  function addToCart()
  {
    alert("Added To Cart!");
  }
</script>
   
    
</body>
</html>