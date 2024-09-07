<?php
session_start();
include('../config/conn.php');

if(isset($_POST['submit'])){
    $product = mysqli_real_escape_string($conn, $_POST['product']);
    $categories = mysqli_real_escape_string($conn, $_POST['categories']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $sql = "INSERT INTO products (product, category, description, quantity, price) VALUES('$product', '$categories', '$description', '$quantity', '$price')";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['success'] = "Product Successfully Added!";
        header('Location: products.php');
        exit(0);
    } else {
        $_SESSION['error'] = "Failed to Add the Product!";
        header('Location: products.php');
        exit(0);
    }
}

?>

<?php
$title = "Add Product | Inventory Management System";
include('../includes/header.php');

include('../includes/sidebar.php');
?>

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card card-body">
                <h1 class="fw-bold">Add Product</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php
        include('success.php');
        include('error.php');
    ?>

    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card card-body">
                <form action="add-products.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="product" placeholder="Enter Product Name" required>
                        <label for="floatingInput">Product</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="categories" id="floatingSelect" aria-label="Floating label select example" required>
                            <option selected>Choose Category</option>
                            <?php
                                $sql = "SELECT * FROM categories";
                                $result = mysqli_query($conn, $sql);

                                if(mysqli_num_rows($result) > 0){
                                    foreach($result as $category){
                                        echo '<option value="' . $category['category'] . '">' . $category['category'] . '</option>';
                                    }
                                } else {
                                    echo "<option value=''>No categories found</option>";
                                }
                            ?>
                        </select>
                        <label for="floatingSelect">Category</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="description" placeholder="Enter Description" required>
                        <label for="floatingInput">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="quantity" placeholder="Enter Description" required>
                        <label for="floatingInput">Quantity</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="price" placeholder="Enter Description" required>
                        <label for="floatingInput">Price</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>