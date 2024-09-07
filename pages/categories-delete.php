<?php
session_start();
include('../config/conn.php');

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM categories WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['success'] = "Category Deleted Successfully!";
        header('location: categories.php');
        exit(0);
    } else {
        $_SESSION['error'] = "Failed to Delete the Category!";
        header('location: categories.php');
        exit(0);
    }
}
?>