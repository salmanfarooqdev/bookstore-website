<?php

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['userEmail'])) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}

$servername = "localhost";
$username = "root";
$passworddb = "";
$database = "bookstore";

$con = mysqli_connect($servername,$username,$passworddb,$database);

if(!$con)
{
    die("Error connecting to database: " . mysqli_connect_error());
}
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
  $bookIds = $_POST['bookIds'];
  $quantities = $_POST['quantities'];

  $_SESSION['bookIds'] = $bookIds;
  $_SESSION['quantities'] = $quantities;

  // Clear the cart after checkout
  // unset($_SESSION['cart']);

  // Redirect to a confirmation page
  header('Location: checkout.php');
  exit();
  }
?>



<!DOCTYPE html>
<html>
<head>
    <title>My Webpage</title>
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
    td select{
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
              <div class="cart-page-content"> <!--inside here-->
                
                
                <h1 style="margin-bottom: 30px; color: aliceblue;">Checkout</h1>

                
                <form action="confirmation.php" method="POST" >
              <div class="tablediv">
              <table class="addBookTable" >
                        <tr>
                            <td>Name </td>
                            <td><input type="text" name="name" required style="height: 30px;"></td>
                        </tr>
                        <tr height="100px" >
                            <td>Address</td>
                            <td> <textarea name="address" id="" cols="50" rows="80" style="height: 130px;"></textarea> </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><input type="text" name="city" required style="height: 30px;"></td>
                        </tr>
                       
                        <tr>
                            <td>Country</td>
                            <td><select name="country" id="" style="height:30px;">
                            <option value="">Select a Country</option>
                            <option value="Pakistan" selected>Pakistan</option>
                            <option value="India">India</option>
                            <option value="Russia">Russia</option>
                            <option value="Italy">Italy</option>
                           
                            </select></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone" required style="height: 30px;"></td>
                        </tr>
                        <tr height="30px;">
                            
                            <td colspan="2"><input type="submit" class="subBook2" name="subCheckout" value="Ship to this address" required ></td>
                        </tr>
                    </table>
                    </div>

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