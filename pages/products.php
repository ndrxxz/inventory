<?php
session_start();
include('../config/conn.php');

$title = "Products | Inventory Management System";
include("../includes/header.php");

include("../includes/sidebar.php");
?>

<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h1 class="fw-bold">Products</h1>
            </div>
        </div>
    </div>

    <?php
        include('success.php');
        include('error.php');
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card my-2">
                <div class="card-header bg-white">
                    <a href="add-products.php" class="btn btn-primary float-end">Add Product</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Product</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM products";
                                    $result = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($result) > 0){
                                        foreach($result as $products){
                                ?>
                                <tr>
                                    <td class="text-center"><?= $products['id']; ?></td>
                                    <td class="text-center"><?= $products['product']; ?></td>
                                    <td class="text-center"><?= $products['category']; ?></td>
                                    <td class="text-center"><?= $products['description']; ?></td>
                                    <td class="text-center"><?= $products['quantity']; ?></td>
                                    <td class="text-center"><?= $products['price']; ?></td>
                                    <td class="text-center">
                                        <a href="products-edit.php?id=<?= $products['id']; ?>" class="btn btn-success"><span><i class="bi bi-pencil-square"></i> Edit</span></a>
                                        <a href="products-delete.php?id=<?= $products['id']; ?>" class="btn btn-danger del"><span><i class="bi bi-trash3-fill"></i> Delete</span></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h4>No products found</h4>";
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