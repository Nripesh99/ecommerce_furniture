<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']==='admin') {

include '../components/AdminNav.php';
include "../config/db.php";
$sql = "SELECT count(product_id) as product FROM product_details ";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $product = $row['product'];

}
$sql2 = "SELECT count(order_id) as abc FROM order_details";
$result2 = mysqli_query($conn, $sql2);

if ($result2) {
    $row2 = mysqli_fetch_assoc($result2);
    $order = $row2['abc']; 
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Product </h5>
                    <div class="text-center">

                        <p class="card-text ">The number of Product is
                            <?= "<h3>" . $product . "</h3>" ?>
                        </p>
                    </div>
                    <div class="text-center">

                        <a href="showallproduct.php" class="btn btn-primary">Product Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Order </h5>
                    <div class="text-center">

                        <p class="card-text ">The number of Product is
                            <?= "<h3>" . $order . "</h3>" ?>
                        </p>
                    </div>
                    <div class="text-center">

                        <a href="showallorder.php" class="btn btn-primary">Orders Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

} else {
    header('location:../backend/logoutApi.php');
} ?>

