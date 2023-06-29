<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .group{
      height: 950px;
  width: 100%;
  background-color: aliceblue;
  display: flex;
    }
  </style>
</head>
<body>

    <div class="container">
    <div class="header">
      <div class="name"> <h1>Reader's Palace</h1></div>
      <div class="search-area"><input type="search" name="" id="" placeholder="Search..."> 
        
      </div>
      <div class="vl2"></div>
      
      <a href="cartp.html"><i class="fa fa-shopping-cart" style="font-size:28px; color: aliceblue; position: relative; top:20px;right:65px;"></i>
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
                
                  <div class="menudiv"> <a href="index.html">Home</a> </div>
                  <div class="menudiv"><a href="about.html">About Us</a> </div>
                  <div class="menudiv"> <a href="contact.html">Contact Us</a> </div>
                 
               
              </div>
              <div class="categories">
                <span class="categ">Categories</span> 
                <ul>
                  <li><a href="fiction.html" target="_blank" >Fiction</a></li>
                  <li><a href="non-fiction.html"  target="_blank">Non-Fiction</a></li>
                  <li><a href="classics.html"  target="_blank">Classics</a></li>
                  <li><a href="thrillers.html"  target="_blank">Thrillers</a></li>
                </ul>
              </div>
            </div>
            <div class="main-area">
              <div class="page-content"> <!--inside here-->
                
                
                <div class="admins"> Welcome Admin</div>
                <div class="adminButtons"> <button onclick="window.location.href = 'add-book.php';">Add a Book</button><button onclick="window.location.href = 'delete-book.php';">Delete Book</button><button onclick="window.location.href = 'update-book.php';" >Update Book</button> </div>
               
                

                

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