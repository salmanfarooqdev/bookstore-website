<?php
$msg3="";
if(isset($_REQUEST['msg3']))
{
$msg3 = $_REQUEST['msg3'];
}
$msg4="";
if(isset($_REQUEST['msg4']))
{
$msg4 = $_REQUEST['msg4'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Webpage</title>
  <link rel="stylesheet" href="index.css">
  <style>
    td{
        line-height: 40px;

    }
    form{
        position: relative;
        bottom: 40px;
    }
   
  </style>
</head>
<body>

    <div class="login-container">
       
        <div class="login-div">
            <h1 id="logh1">Sign Up</h1>

            <span class="errors" id="err"> <?php echo $msg3; ?></span>
            <span class="corrects"> <?php echo $msg4 ?></span>


            <div class="Form">
                <form action="process.php" method="POST" onsubmit="return check()">
                    <table style="height: 100px; font-size: 20px;">
                        <tr>
                            <td><label>First Name</label></td>
                            <td><input type="text" name="fname" placeholder=" Enter First name" required style="height: 30px;"></td>
                        </tr>
                        <tr>
                            <td><label>Last Name</label></td>
                            <td><input type="text" name="lname" placeholder=" Enter Last name" required style="height: 30px;"></td>
                        </tr>
                        <tr>
                            <td>Email </td>
                            <td><input type="email" name="sem" placeholder=" ---@xyz.com" required style="height: 30px;"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td> <input type="password" id="pass" name="spass" placeholder=" Enter password" required style="height: 30px;"></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td> <input type="password" id="confirmPass" name="cpass" placeholder=" Enter password" required style="height: 30px;"></td>
                        </tr>
                        
                        <tr style="position: relative;left:100px; top:10px;">
                            <td><input type="submit" name="submitSignup" value="Sign Up" style="width: 70px; height: 30px; border-radius: 30px ;"></td>
                        </tr>
                        <tr style="position: relative; top:50px;left:35px;">
                            <td>Already a member? </td>
                            <td><a href="login.php" style="color:cadetblue;margin-left: 8px;"> Log In</a></td>
                        </tr>
                    </table>
                
                </form>

            </div>
        </div>

      </div>
    


      <script>
        function check()
        {
            let pass = document.getElementById("pass").value;
            let confirmPass = document.getElementById("confirmPass").value;

            if(pass!=confirmPass)
            {
                document.getElementById("err").innerHTML = "Password Doesnt Match";
                return false;
            }
        }
  


      </script>
</body>
</html>