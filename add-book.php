<?php 
$msg5="";
if(isset($_REQUEST['msg5']))
{
$msg5 = $_REQUEST['msg5'];
}
ini_set('display_errors', 1);   //php error display
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
      
      <!-- 
      <a href="login.php">
      <i class="fa fa-user-circle" style="font-size:28px;color: aliceblue; position: relative; top:22px;right:35px; "></i>
    </a> -->
    <div class="vl"></div>
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
              <div class="page-content"> <!--inside here-->
              <div class="admins2"> Add a Book</div> 
              <form action="process.php" method="POST" enctype="multipart/form-data">
              <div class="tablediv">
              <table class="addBookTable" >
                        <tr>
                            <td>Book Name </td>
                            <td><input type="text" name="bookName" required style="height: 30px;"></td>
                        </tr>
                        <tr>
                            <td>Book Author</td>
                            <td><input type="text" name="bookAuthor" required style="height: 30px;"></td>
                        </tr>
                        <tr>
                            <td>Book Price</td>
                            <td><input type="number" name="bookPrice" required style="height: 30px;"></td>
                        </tr>
                        <tr height="100px" >
                            <td>Book Description</td>
                            <td> <textarea name="bookDesc" id="" cols="50" rows="80" style="height: 130px;"></textarea> </td>
                        </tr>
                        <tr height="100px">
                            <td>Author Description</td>
                            <td> <textarea name="authorDesc" id="" cols="50" rows="80" style="height: 130px;"></textarea> </td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><select name="category" id="" style="height:30px;">
                            <option value="">Select a Category</option>
                            <option value="Fiction">Fiction</option>
                            <option value="Non-Fiction">Non-Fiction</option>
                            <option value="Classic">Classic</option>
                            <option value="Thriller">Thriller</option>
                            <option value="Popular-Book">Popular-Book</option>
                            <option value="Recent-Release">Recent-Release</option>
                            <option value="Best-Seller">Best-Seller</option>


                            </select></td>
                        </tr>
                        <tr>
                            <td>Upload Image</td>
                            <td><input type="file" name="image" required style="height: 30px;"></td>
                        </tr>
                        <tr height="30px;">
                            
                            <td colspan="2"><input type="submit" class="subBook" name="submitBook"  required ></td>
                        </tr>
                        </form>
                    </table>
                   
                    </div>

              

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