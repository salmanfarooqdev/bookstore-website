<!DOCTYPE html>
<html>
<head>
    <title>Delete Book</title>
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
      <a href="login.php">
      <i class="fa fa-user-circle" style="font-size:28px;color: aliceblue; position: relative; top:22px;right:35px; "></i>
    </a>
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
                
              <div class="admins2"> Delete a Book</div>
              <form action="process.php" method="POST" enctype="multipart/form-data">
              <div class="tablediv">
              <table class="addBookTable">
                        <tr>
                            <td>Book Name </td>
                            <td><input type="text" name="bookName" required style="height: 30px;"></td>
                        </tr>
                        
                        <tr height="30px;">
                            
                            <td colspan = "2"><input type="submit" class="subBook" name="deleteBook" required ></td>
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