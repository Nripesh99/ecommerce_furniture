<?php 
session_start();
include '../components/AdminNav.php';
include "../config/db.php";
if (isset($_SESSION['username']) && $_SESSION['username']==='admin'):

$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$results = mysqli_fetch_assoc($result);
?>

<div class="main-container">
    <div class="container">
        <div class="card">
            <form action="../backend/productAddApi.php" method="post" enctype="multipart/form-data" class="p-3">
                <h3 class="mb-3 text-center">Add Product</h3>
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name:</label>
                    <input type="text" name="productName" id="productName" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="text" name="quantity" id="quantity" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">Select Category</option>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <option value="<?= $row['id'] ?>">
                                <?= $row['category_name'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Product Description:</label>
                    <textarea name="product-desc" id="desc" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image:</label>
                    <input type="file" name="file" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</div>
</div><br><br><br><br><br>
<br><br><br><br><br>
<?php
endif;
header("Location:../backend/logoutApi.php");
die();
 ?>
<?php include "../components/footer.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>