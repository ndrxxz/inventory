<?php
    session_start();
    include('../config/conn.php');
?>

<?php
$title = "Categories | Inventory Management System";
include("../includes/header.php");

include("../includes/sidebar.php");
?>

<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h1 class="fw-bold">Categories</h1>
            </div>
        </div>
    </div>

    <?php include('success.php') ?>
    <?php include('error.php') ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card my-2">
                <div class="card-header bg-white">
                    <a href="add-categories.php" class="btn btn-primary float-end">Add Categories</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                                    $query = "SELECT * FROM categories";
                                    $result = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($result) > 0){
                                        foreach($result as $categories){
                                ?>
                                <tr>
                                    <td class="px-1 text-center"><?= $categories['id']; ?></td>
                                    <td class="px-1 text-center"><?= $categories['category']; ?></td>
                                    <td class="px-3 py-2 text-center">
                                        <a href="categories-edit.php?id=<?= $categories['id']; ?>" class="btn btn-success btn-sm edit"><span><i class="bi bi-pencil-square"></i> Edit</span></a>
                                        <a href="categories-delete.php?id=<?= $categories['id']; ?>" class="btn btn-danger btn-sm del"><span><i class="bi bi-trash3-fill"></i> Delete</span></a>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    } else {

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

<?php include("../includes/footer.php"); ?>