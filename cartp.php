<?php
session_start();

// database connection
$servername = "localhost";
$username = "root";
$passworddb = "";
$database = "bookstore";

$con = mysqli_connect($servername, $username, $passworddb, $database);

if (!$con) {
    die("Error connecting to database: " . mysqli_connect_error());
}

// Remove book from cart
if (isset($_GET['delete'])) {
  $bookId = $_GET['delete'];

  if (isset($_SESSION['cart'])) {
      // Find the book ID in the cart array and remove it
      $index = array_search($bookId, $_SESSION['cart']);
      if ($index !== false) {
          unset($_SESSION['cart'][$index]);
      }
  }
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>My Webpage</title>
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
      <!-- 
      <a href="login.php">
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
            <form id="checkoutForm" action="checkout.php" method="post">
              <div class="cart-page-content"> <!--inside here-->
                
                
                <h1 style="margin-bottom: 30px; color: aliceblue;">Cart</h1>

                <?php
      // Display the books in the cart
      if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];

        // Loop through the book IDs in the cart
        foreach ($cart as $bookId) {
          // Fetch book details from the database using the book ID
          $sql = "SELECT * FROM books WHERE Id = $bookId";
          $result = mysqli_query($con, $sql);

          // Check if the query was successful and fetch the book details
          if ($result && mysqli_num_rows($result) > 0) {
            $book = mysqli_fetch_assoc($result);

            $bookName = $book['bookName'];
            $price = $book['price'];
            $image = $book['bookImage'];

            // Display the book details in the cart page
            echo '<div class="cart-div">';
            echo '<div class="cart-book-img"><img src="' . $image . '" alt=""></div>';
            echo '<div class="cart-book-info">';
            echo '<h2 class="cart-book-title">' . $bookName . '</h2>';
            echo '<br>';
            echo '<p class="cart-book-price">' . $price . '</p>';
            echo '<br>';
            echo '<input type="number" class="quantity-input" value="1" min="1" max="20" data-book-id="' . $bookId . '" onchange="calculateSubtotal(' . $price . ')" >';
            echo '<a href="?delete=' . $bookId . '" class="delete-cart">Delete</a>';
            echo '<br>';
            echo '</div>';
            echo '</div>';

            // Add hidden inputs for book IDs and quantities
            echo '<input type="hidden" name="bookIds[]" value="' . $bookId . '">';
            echo '<input type="hidden" class="quantity-hidden" name="quantities[]" value="1">'; // Set a default quantity of 1
          }
        }
      }
    ?>
              
                
              <h3 class="subTotal">Subtotal:   <span id="subTot"></span></h3>

                <!-- <a href="checkout.php" class="checkout-btn" onclick = "storeCheckoutData()">Proceed to Checkout</a> -->
                <button type="submit" class="checkout-btn" onclick = "storeCheckoutData()">Checkout</button>

              </div>
              </form>
            </div>
          </div>
        </div>
        <div class="footer">
            <p>&copy; 2023 Readers Palace. All rights reserved.</p>
        </div>
      </div>

      <script>
        
        function calculateSubtotal() 
        {
        const quantityInputs = document.querySelectorAll('.quantity-input');
        let subtotal = 0;

        quantityInputs.forEach(function(input) 
        {
            const priceElement = input.parentNode.querySelector('.cart-book-price');
            const price = priceElement.textContent;
            const quantity = input.value;
            const bookSubtotal = quantity * price;
            subtotal += bookSubtotal;
        });

        // Update the subtotal value on the page
        const subtotalElement = document.getElementById('subTot').innerHTML = 'Rs. '+ subtotal;
        // subtotalElement.textContent = 'Rs. ' + subtotal.toFixed(2);
       }
    
          // Calculate subtotal initially for the default quantity
          calculateSubtotal();

          window.onload = function() {
              calculateSubtotal();
          };

          function storeCheckoutData() {
            const quantityInputs = document.querySelectorAll('.quantity-input');
            const quantityHiddenInputs = document.querySelectorAll('.quantity-hidden');

            quantityInputs.forEach(function(input, index) {
              const quantity = input.value;

              // Update the corresponding hidden input field for quantity
              quantityHiddenInputs[index].value = quantity;
            });
          }

         
         
  
      </script>
    
</body>
</html>