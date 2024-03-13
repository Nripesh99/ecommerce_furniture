

<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']==='admin') {
include '../components/AdminNav.php';
include "../config/db.php";
 ?>
<?php 

    $user_id = $_SESSION['user_id'];
    $query = "select * from product_details join categories on product_details.category_id = categories.id  order by product_id desc ";

    $query_result = mysqli_query($conn, $query);
    $count = 0;
    ?>
    <div class="container mt-5">
        <h3>Product List</h3>
        <div class="text-end">
            <a class="btn btn-primary" href="productAdd.php">Add Product</a>
        </div>
        <table class="table table-striped" id="cart_tbl">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Product Image </th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category name</th>
                  
                </tr>
            </thead>
            <tbody>
       
                <?php while ($row = mysqli_fetch_assoc($query_result)) {
                    $count = $count + 1;
                    $product_name = $row['product_name'];
                    $price = $row['product_price'];
                    $product_id = $row['product_id'];
                    $quantity = $row['product_qty'];
                    $image = $row['product_image'];
                    $category_name=$row['category_name'];

                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo ($count); ?>
                        </th>
                        <td><img src="../uploads/<?php echo ($image) ?>" alt="" width="100" height="100"></td>
                        <td>
                            <?php echo ($product_name); ?>
                        </td>
                        <td>Rs.
                            <?php echo ($price); ?>
                        </td>
                        <td>
                            <?php echo ($quantity) ?>
                        </td>
                  
                        <td>
                            <?php echo ($category_name) ?>
                        </td>
                       
                    </tr>
                    <?php
                } ?>

            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


    </body>

    </html>
    <?php

} else {
    header('location:../backend/logoutApi.php');
    die();
} ?>


