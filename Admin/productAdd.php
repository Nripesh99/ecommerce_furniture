<?php include "../components/AdminNav.php";
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$results = mysqli_fetch_assoc($result);
?>

<div class="main-container">
    <div class="container">
        <div class="card" id="login-card">
            <form action="../backend/productAddApi.php" method="post" enctype="multipart/form-data"
                style="margin-left:1rem">
                <h3 class="login-head">Add Product</h3>
                <label for="productName">Product Name:</label><br>
                <input type="text" name="productName" id="username"><br><br>
                <label for="price">Price:</label><br>
                <input type="text" name="price" id="password"><br><br>
                <label for="quantity">Quantity:</label><br>
                <input type="text" name="quantity" id="password"><br><br>
                <label for="category">Category:</label><br>
                <select name="category" id="password">
                    <option value="">Select Category</option>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <option value="<?= $row['id'] ?>">
                            <?= $row['category_name'] ?>
                        </option>
                    <?php endwhile; ?>
                </select><br><br>
                <label for="desc">Product Description:</label><br>
                <textarea name="product-desc" id="" cols="52" rows="3"></textarea>
                <label for="price">Product Image:</label><br>
                <input type="file" name="file" id="password"><br><br>
                <input type="submit" value="Add Product" class="btn btn-primary" id="login-btn">

            </form>
        </div>
    </div>
</div><br><br><br><br><br>
<br><br><br><br><br>
<?php include "../components/footer.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>