<?php
session_start();
include('../config/conn.php');

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['success'] = "Product Deleted Successfully!";
        header('location: products.php');
        exit(0);
    } else {
        $_SESSION['error'] = "Failed to Delete Product!";
        header('location: products.php');
        exit(0);
    }
}

?>