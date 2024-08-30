<?php
    //start a new session
    session_start();

    // include the database connection file
    include('../config/conn.php');
?>

<?php
// set the title of the page
$title = "Categories | Inventory Management System";

// include the header of the page
include("../includes/header.php");

// include the sidebar of the page
include("../includes/sidebar.php");
?>

<!-- main content -->
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h1 class="fw-bold">Categories</h1>
            </div>
        </div>
    </div>

    <!-- includes the success and error file for message handling -->
    <?php include('success.php') ?>
    <?php include('error.php') ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card my-2">
                <div class="card-header bg-white">
                    <!-- button to add new category -->
                    <a href="add-categories.php" class="btn btn-primary float-end">Add Categories</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- categories table -->
                        <table id="myTable" class="table table-white table-bordered w-100">
                            <thead>
                                <tr>
                                    <th class="px-5 py-2 text-center">ID</th>
                                    <th class="px-5 py-2 text-center">Category</th>
                                    <th class="px-5 py-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // query to get all categories
                                    $query = "SELECT * FROM categories";
                                    $result = mysqli_query($conn, $query);

                                    // check if there are any categories returned by the query
                                    if(mysqli_num_rows($result) > 0){
                                        foreach($result as $categories){
                                ?>
                                <tr>
                                    <td class="px-1 text-center"><?= $categories['id']; ?></td>
                                    <td class="px-1 text-center"><?= $categories['category']; ?></td>
                                    <td class="px-3 py-2 text-center">
                                        <!-- edit button for each category -->
                                        <a href="categories-edit.php?id=<?= $categories['id']; ?>" class="btn btn-success btn-sm edit"><span><i class="bi bi-pencil-square"></i> Edit</span></a>
                                        
                                        <!-- delete button for each category -->
                                        <a href="categories-delete.php?id=<?= $categories['id']; ?>" class="btn btn-danger btn-sm del"><span><i class="bi bi-trash3-fill"></i> Delete</span></a>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    } else {
                                        // no categories found
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- include the footer of the page -->
<?php include("../includes/footer.php"); ?>