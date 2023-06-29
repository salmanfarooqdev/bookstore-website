<?php
$msg="";
$msg2="";
if(isset($_REQUEST['msg']))
{
$msg = $_REQUEST['msg'];
}
if(isset($_REQUEST['msg2']))
{
$msg2 = $_REQUEST['msg2'];
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>My Webpage</title>
  <link rel="stylesheet" href="index.css">
  <style>
   
  </style>
</head>
<body>

    <div class="login-container">
       
        <div class="login-div">
            <h1 id="logh1">Log In</h1>
            <span class="errors2"> <?php echo $msg2 ?></span>
            <span class="errors2"> <?php echo $msg ?></span>

            <div class="Form">
                <form action="process.php" method="POST">
                    <table style="height: 170px; font-size: 20px;">
                        <tr>
                            <td>Email </td>
                            <td><input type="email" name="lem" placeholder=" ---@xyz.com" required style="height: 30px;"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td> <input type="password" name="lpass" placeholder=" Enter password" required style="height: 30px;"></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr style="position: relative;left:100px; top:10px;">
                            <td><input type="submit" name="submitLogin" value="Log in" style="width: 60px; height: 30px; border-radius: 30px ;"></td>
                        </tr>
                        <tr style="position: relative; top:80px;">
                            <td>Not a member? </td>
                            <td><a href="signup.php" style="color:cadetblue;position:relative;left:15px;"> Sign up now</a></td>
                        </tr>
                    </table>
                
                </form>

            </div>
        </div>

      </div>
    
</body>
</html>