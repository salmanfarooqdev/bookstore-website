<?php
ini_set('display_errors', 1);   //php error display
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$servername = "localhost";
$username = "root";
$passworddb = "";
$database = "bookstore";

$con = mysqli_connect($servername,$username,$passworddb,$database);

if(!$con)
{
    die("Error connecting to database: " . mysqli_connect_error());
}
  
  if(isset($_POST['subCheckout']))
  {
    $Cname= $_POST['name'];
    $Caddress = $_POST['address'];
    $Ccity = $_POST['city'];
    $Ccountry= $_POST['country'];
    $Cphone = $_POST['phone'];

    $bookIds = $_SESSION['bookIds'];
    $quantities = $_SESSION['quantities'];

    $_SESSION['Cname'] = $Cname;
    $_SESSION['Caddress'] = $Caddress;
    $_SESSION['Ccity'] = $Ccity;
    $_SESSION['Ccountry'] = $Ccountry;
    $_SESSION['Cphone'] = $Cphone;

  }
  

  if(isset($_POST['confirmationS']))
  {



    $Cname = $_SESSION['Cname'];
    $Caddress = $_SESSION['Caddress'];
    $Ccity = $_SESSION['Ccity'];
    $Ccountry = $_SESSION['Ccountry'];
    $Cphone = $_SESSION['Cphone'];

    $bookIds = $_SESSION['bookIds'];
    $quantities = $_SESSION['quantities'];

    // Insert user details into the Order table
        $insertOrderQuery = "INSERT INTO orders (customer_name, cust_address, city, country, phone) VALUES ('$Cname', '$Caddress', '$Ccity', '$Ccountry', '$Cphone')";
        $result = mysqli_query($con, $insertOrderQuery);

    if ($result) 
    {

        $orderID = mysqli_insert_id($con);

    // Insert order items into the Order Item table
    foreach (array_combine($bookIds, $quantities) as $bookId => $quantity) 
    {
        $insertOrderItemQuery = "INSERT INTO order_items (order_id, bookid, quantity) VALUES ('$orderID', '$bookId', '$quantity')";
        mysqli_query($con, $insertOrderItemQuery);

       

    }
    unset($_SESSION['bookIds']);
    unset($_SESSION['quantities']);
    unset($_SESSION['cart']);
    echo "<script>alert('Book ordered!');</script>";
    header("Location:index.php");
  


   
  } 
  else {
    echo "<script>alert('failed!');</script>";  }

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
    td{
        /* line-height: 30px; */
        color:aliceblue;
        font-size:18px; 
        
    }
    td input{
      margin-left:40px;
    }
    td{
      text-align : start;
      padding:5px;
    }
    td textarea{
      position: relative;
      left:38px;
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
              <div class="cart-page-content"> <!--inside here-->
                
                
                <h1 style="margin-bottom: 30px; color: aliceblue;">Confirmation</h1>
        <form action="" method="post">

                <?php
                // Loop through the book IDs in the cart
            foreach (array_combine($bookIds, $quantities) as $bookId => $quantity) 
            {
            // Fetch book details from the database using the book ID
            $sql = "SELECT * FROM books WHERE Id = $bookId";
            $result = mysqli_query($con, $sql);
  
            // Check if the query was successful and fetch the book details
            if ($result && mysqli_num_rows($result) > 0)
             {
              $book = mysqli_fetch_assoc($result);
  
              $bookName = $book['bookName'];
              $price = $book['price'];
              $image = $book['bookImage'];
  
              // Display the book details in the confirmation page
              echo '<div class="cart-div">';
              echo '<div class="cart-book-img"><img src="' . $image . '" alt=""></div>';
              echo '<div class="cart-book-info">';
              echo '<h2 class="cart-book-title">' . $bookName . '</h2>';
              echo '<br>';
              echo '<p class="cart-book-price">Price: ' . $price . '</p>';
              echo '<br>';
              echo '<p class="cart-book-price">Quantity: ' . $quantity. '</p>';
              echo '</div>';
              echo '</div>';
            
            
            }
          }
        
      ?>
      <div class="tablediv">
              <table class="addBookTable2" >
                        <tr>
                            <td>Name </td>
                            <td><?php echo $Cname ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td> <?php echo $Caddress?> </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?php echo $Ccity ?></td>
                        </tr>
                       
                        <tr>
                            <td>Country</td>
                            <td><?php echo $Ccountry ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><?php echo $Cphone ?></td>
                        </tr>
                        
                    </table>
                    </div>
                      <input type="submit" class="subBook2" name="confirmationS" value="Place Order" required >
  
                        
                      </form>

                
                

              </div>
             
            </div>
          </div>
        </div>
        <div class="footer">
            <p>&copy; 2023 Readers Palace. All rights reserved.</p>
        </div>
      </div>
    
</body>
</html>