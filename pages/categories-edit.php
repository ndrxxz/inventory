<?php
session_start();
include('../config/conn.php');

if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $updated_category = mysqli_real_escape_string($conn, $_POST['updated_category']);

    $query = "UPDATE categories SET category = '$updated_category' WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['success'] = "Category updated successfully!";
        header("Location: categories.php");
        exit(0);
    } else {
        $_SESSION['error'] = "Failed to update category!";
        header("Location: categories.php");
        exit(0);
    }
}
?>

<?php 
$title = "Edit Category | Inventory Management System";
include('../includes/header.php'); 

include('../includes/sidebar.php');
?>

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card card-body">
                <h1 class="fw-bold">Edit Category</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="categories.php">Categories</a></li>
                    <li class="breadcrumb-item"><a href="add-categories.php">Add Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php include('success.php'); ?>
    <?php include('error.php'); ?>

    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card card-body">
                <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];

                        $sql = "SELECT * FROM categories WHERE id = '$id'";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0){
                            $category = mysqli_fetch_assoc($result)
                ?>
                <form action="categories-edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $category['id']; ?>">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="updated_category" placeholder="Enter Category" value="<?php echo $category['category']; ?>" required>
                        <label for="floatingInput">Category</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="update" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
                <?php
                        } else {
                            echo "<h4>Category not found!</h4>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>