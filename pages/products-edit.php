<?php
session_start();
include('../config/conn.php');

if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $updated_product = mysqli_real_escape_string($conn, $_POST['updated_product']);
    $updated_categories = mysqli_real_escape_string($conn, $_POST['updated_categories']);
    $updated_description = mysqli_real_escape_string($conn, $_POST['updated_description']);
    $updated_quantity = mysqli_real_escape_string($conn, $_POST['updated_quantity']);
    $updated_price = mysqli_real_escape_string($conn, $_POST['updated_price']);

    $sql = "UPDATE products SET product = '$updated_product', category = '$updated_categories', description = '$updated_description',
    quantity = '$updated_quantity', price = '$updated_price' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['success'] = "Product Updated Successfully!";
        header('Location: products.php');
        exit(0);
    } else {
        $_SESSION['error'] = "Failed to Update Product!";
        header('Location: products.php');
        exit(0);
    }
}
?>

<?php
$title = "Edit Product | Inventory Management System";
include('../includes/header.php');

include('../includes/sidebar.php');
?>

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card card-body">
                <h1 class="fw-bold">Edit Product</h1>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                    <li class="breadcrumb-item"><a href="add-products.php">Add Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
                <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];

                        $sql = "SELECT * FROM products WHERE id = '$id'";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0){
                            $products = mysqli_fetch_assoc($result);
                ?>
                <form action="products-edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="updated_product" placeholder="Enter Product Name" value="<?php echo $products['product'] ?>" required>
                        <label for="floatingInput">Product</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="updated_categories" id="floatingSelect" aria-label="Floating label select example" value="<?php echo $products['category']; ?>" required>
                            <option selected>Choose Category</option>
                            <?php
                                $sql = "SELECT * FROM categories";
                                $result = mysqli_query($conn, $sql);

                                if(mysqli_num_rows($result) > 0){
                                    while($category = mysqli_fetch_assoc($result)){
                                        $select = ($category['category'] === $products['category']) ? 'selected' : '';
                                        echo '<option value="' . $category['category'] . '" '. $select .'>' . $category['category'] . '</option>';
                                    }
                                } else {
                                    echo "<option value=''>No categories found</option>";
                                }
                            ?>
                        </select>
                        <label for="floatingSelect">Category</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="updated_description" placeholder="Enter Description" value="<?php echo $products['description'] ?>" required>
                        <label for="floatingInput">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="updated_quantity" placeholder="Enter Description" value="<?php echo $products['quantity']; ?>" required>
                        <label for="floatingInput">Quantity</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="updated_price" placeholder="Enter Description" value="<?php echo $products['price']; ?>" required>
                        <label for="floatingInput">Price</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="update" class="btn btn-primary">Edit Product</button>
                    </div>
                </form>
                <?php
                    } else {
                        echo "<h4>No Products Found!</h4>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>