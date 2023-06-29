<?php

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

session_start();

if(isset($_POST['submitLogin']))   //login php
{
    $loginEmail = $_POST['lem'];
    $loginPass = $_POST['lpass'];

    $query = "SELECT * FROM admin WHERE adminEmail = '$loginEmail' and adminPassword = '$loginPass'";
    $runQuery = mysqli_query($con,$query);
    if(mysqli_num_rows($runQuery)==1)
    {
        $_SESSION['adminEmail'] = $loginEmail;
        header("Location:admin.php");
    }
    else
    {

    $q2 = "SELECT * FROM users WHERE email = '$loginEmail' and pass = '$loginPass'";
    $q5 = "SELECT * FROM users WHERE email = '$loginEmail'";

    $emailExist = mysqli_query($con, $q5);
    $fetch = mysqli_query($con, $q2);
    $rows = mysqli_fetch_assoc($fetch);
    
    if($rows != 0 )  // logged in successful
    {
        $_SESSION['userEmail'] = $loginEmail; 
        header("Location:index.php");
    }
    elseif( mysqli_num_rows($emailExist)==1)  // email exist but password incorrect
    {
        header("location:login.php?msg=password is invalid");
     
    }
    else{ // user not registered
        header("location:login.php?msg2=user not registered");
    }
}

}

if(isset($_POST['submitSignup']))     //sign up php
{
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['sem'];
    $password = $_POST['spass'];

    $q3 = "SELECT email FROM users WHERE email = '$email'"; // to check duplicate emails
    $verify = mysqli_query($con, $q3);
    if(mysqli_num_rows($verify) != 0)  // if email already exists
    {
        header("location:signup.php?msg3=Email is already in use");
    }
    else
    {
        $q1 = "INSERT INTO users(firstName,lastName,email,pass)
        VALUES ('$firstName','$lastName','$email','$password')";
    
        $insert = mysqli_query($con,$q1);
    
        if($insert)  // registered user
        {
            $_SESSION['userEmail'] = $email; 
            header("location:signup.php?msg4=Successfully Registered");
        }
        else{
            echo "Error inserting record: " . mysqli_error($con);
        }

    }
}

if(isset($_POST['submitBook']))    // add book php
{

    $bookName = $_POST['bookName'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookPrice = $_POST['bookPrice'];
    $bookDesc = $_POST['bookDesc'];
    $authorDesc = $_POST['authorDesc'];
    $category = $_POST['category'];
    $image = $_FILES['image'];

    $escapedParagraph = mysqli_real_escape_string($con, $bookDesc);
    $escapedParagraph2 = mysqli_real_escape_string($con, $authorDesc);



    //file code
    $fileName = $image['name'];
    $tmpName = $image['tmp_name'];

    $ext = array('jpg','jpeg','png');  // file extension checking
    $fileExt = explode('.',$fileName);
    $file_check = strtolower(end($fileExt));

        if(in_array($file_check,$ext))
        {
            $destination = 'bookImages/'.$fileName;
            move_uploaded_file($tmpName, $destination);
        
            $q7 = "INSERT INTO books(bookName,authorName,price,bookDesc,authorDesc,category,bookImage)
            VALUES ('$bookName','$bookAuthor','$bookPrice','$escapedParagraph','$escapedParagraph2','$category','$destination')";
        
            $insert = mysqli_query($con,$q7);
        
            if($insert)  // book inserted
            {
                echo "<script>alert('book inserted!');</script>";

            }
            else{
                echo "Error inserting record: " . mysqli_error($con);
            }
        }
        else{  //wrong file exiension used

            echo "<script>alert('File extension must be jpg, png or jpeg');</script>";
        }

}



if(isset($_POST['deleteBook']))    // delete book
{
    $bookName = $_POST['bookName'];

    $qq = "SELECT * FROM books WHERE bookName = '$bookName'";
    $rq =  mysqli_query($con,$qq);

    if(mysqli_num_rows($rq)==1)
    {
        $q = "DELETE FROM books WHERE bookName = '$bookName'";
        $runQ = mysqli_query($con,$q);
        if($runQ)
        {
            echo "<script>alert('Book deleted');</script>";
    
        }
    }
    else{
        echo "<script>alert('Book doesnt exist!');</script>";
    }

   
    
}

if(isset($_POST['updateFormBook']))  // update book 
{
    $bookId = $_POST['bookId'];
    $bookName = $_POST['bookName'];
    $authorName = $_POST['bookAuthor'];
    $price = $_POST['price'];
    $bookDesc = $_POST['bookDesc'];
    $authorDesc = $_POST['authorDesc'];
    $category = $_POST['category'];

    $escapedParagraph3 = mysqli_real_escape_string($con, $bookDesc);
    $escapedParagraph4 = mysqli_real_escape_string($con, $authorDesc);

    $query = "UPDATE books SET bookName = '$bookName', authorName = '$authorName', bookDesc = '$escapedParagraph3', authorDesc = '$escapedParagraph4', category = '$category', price = '$price' WHERE Id = '$bookId'";

    if (mysqli_query($con, $query)) 
    {
        echo "<script>alert('Book Updated!');</script>";
        // Redirect to a success page or perform any other actions
    } else 
    {
        echo "Error updating book: " . mysqli_error($con);
    }

    
}





?>