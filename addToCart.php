<?php 
session_start();

if (isset($_GET['Id'])) {
    $bookId = $_GET['Id'];

    if (!empty($bookId)) {
        // Add the book ID to the cart session
        if (isset($_SESSION['cart'])) 
        {
          if (!in_array($bookId, $_SESSION['cart'])){
            $_SESSION['cart'][] = $bookId;
           
          }
        } else {
            $_SESSION['cart'] = array($bookId);
        }
    } else {
        echo "<script>alert('Book ID is empty');</script>";
    }

    header('Location: book-description.php?Id=' . $bookId);
    exit();
}

?>