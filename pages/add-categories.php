<?php
    session_start();
    include('../config/conn.php');

    if(isset($_POST['submit'])){
        $category = mysqli_real_escape_string($conn, $_POST['category']);

        $query = "INSERT into categories (category) VALUES ('$category')";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            $_SESSION['success'] = "Adding Category Successfully!";
            header('Location: categories.php');
            exit(0);
        } else {
            $_SESSION['error'] = "Failed to Add the Category!";
            header('Location: add-categories.php');
            exit(0);
        }
    }

?>

<?php
$title = "Add Category | Inventory Management System";
include("../includes/header.php");

include("../includes/sidebar.php");
?>

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card card-body">
                <h1 class="fw-bold">Add Category</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="categories.php">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php include('success.php') ?>
    <?php include('error.php') ?>

    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card card-body">
                <form action="add-categories.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="category" placeholder="Enter Category" required>
                        <label for="floatingInput">Category</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php"); ?>