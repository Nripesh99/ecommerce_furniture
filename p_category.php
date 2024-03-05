<?php
include 'components/navbar.php';
$cat_id=$_GET['id'];
$catRow="SELECT *FROM product_details WHERE category_id=$cat_id";
$catResult=mysqli_query($conn, $catRow);
?>

<style>
  @import url('https://fonts.googleapis.com/css?family=Muli:400,400i,700,700i');

  body {
    font-family: 'Muli', sans-serif;
    background: #ddd;
  }

  .shell {
    padding: 80px 0;
  }

  .wsk-cp-product {
    background: #fff;
    padding: 15px;
    border-radius: 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    position: relative;
    margin: 20px auto;
  }

  .wsk-cp-img {
    position: absolute;
    top: 5px;
    left: 50%;
    transform: translate(-50%);
    -webkit-transform: translate(-50%);
    -ms-transform: translate(-50%);
    -moz-transform: translate(-50%);
    -o-transform: translate(-50%);
    -khtml-transform: translate(-50%);
    width: 100%;
    padding: 15px;
    transition: all 0.2s ease-in-out;
  }

  .wsk-cp-img img {
    width: 100%;
    transition: all 0.2s ease-in-out;
    border-radius: 6px;
  }

  .wsk-cp-product:hover .wsk-cp-img {
    top: -40px;
  }

  .wsk-cp-product:hover .wsk-cp-img img {
    box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
  }

  .wsk-cp-text {
    padding-top: 150%;
  }

  .wsk-cp-text .category {
    text-align: center;
    font-size: 12px;
    font-weight: bold;
    padding: 5px;
    margin-bottom: 45px;
    position: relative;
    transition: all 0.2s ease-in-out;
  }

  .wsk-cp-text .category>* {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -khtml-transform: translate(-50%, -50%);

  }

  .wsk-cp-text .category>span {
    padding: 12px 30px;
    border: 1px solid #313131;
    background: #212121;
    color: #fff;
    box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
    border-radius: 27px;
    transition: all 0.05s ease-in-out;

  }

  .wsk-cp-product:hover .wsk-cp-text .category>span {
    border-color: #ddd;
    box-shadow: none;
    padding: 11px 28px;
  }

  .wsk-cp-product:hover .wsk-cp-text .category {
    margin-top: 0px;
  }

  .wsk-cp-text .title-product {
    text-align: center;
  }

  .wsk-cp-text .title-product h3 {
    font-size: 20px;
    font-weight: bold;
    margin: 15px auto;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    width: 100%;
  }

  .wsk-cp-text .description-prod p {
    margin: 0;
  }

  /* Truncate */
  .wsk-cp-text .description-prod {
    text-align: center;
    width: 100%;
    height: 62px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    margin-bottom: 15px;
  }

  .card-footer {
    padding: 25px 0 5px;
    border-top: 1px solid #ddd;
  }

  .card-footer:after,
  .card-footer:before {
    content: '';
    display: table;
  }

  .card-footer:after {
    clear: both;
  }

  .card-footer .wcf-left {
    float: left;

  }

  .card-footer .wcf-right {
    float: right;
  }

  .price {
    font-size: 18px;
    font-weight: bold;
  }

  a.buy-btn {
    display: block;
    color: #212121;
    text-align: center;
    font-size: 18px;
    width: 35px;
    height: 35px;
    line-height: 35px;
    border-radius: 50%;
    border: 1px solid #212121;
    transition: all 0.2s ease-in-out;
  }

  a.buy-btn:hover,
  a.buy-btn:active,
  a.buy-btn:focus {
    border-color: #FF9800;
    background: #FF9800;
    color: #fff;
    text-decoration: none;
  }

  .wsk-btn {
    display: inline-block;
    color: #212121;
    text-align: center;
    font-size: 18px;
    transition: all 0.2s ease-in-out;
    border-color: #FF9800;
    background: #FF9800;
    padding: 12px 30px;
    border-radius: 27px;
    margin: 0 5px;
  }

  .wsk-btn:hover,
  .wsk-btn:focus,
  .wsk-btn:active {
    text-decoration: none;
    color: #fff;
  }

  .red {
    color: #F44336;
    font-size: 22px;
    display: inline-block;
    margin: 0 5px;
  }

  @media screen and (max-width: 991px) {
    .wsk-cp-product {
      margin: 40px auto;
    }

    .wsk-cp-product .wsk-cp-img {
      top: -40px;
    }

    .wsk-cp-product .wsk-cp-img img {
      box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
    }

    .wsk-cp-product .wsk-cp-text .category>span {
      border-color: #ddd;
      box-shadow: none;
      padding: 11px 28px;
    }

    .wsk-cp-product .wsk-cp-text .category {
      margin-top: 0px;
    }

    a.buy-btn {
      border-color: #FF9800;
      background: #FF9800;
      color: #fff;
    }
  }
</style>


<?php
if (isset($_SESSION['toastr'])):
  $toastr = $_SESSION['toastr'];?>
<script>
    toastrFunction('<?php echo $_SESSION['toastr']['type']; ?>', '<?php echo $_SESSION['toastr']['message']; ?>');
</script>
<?php
  unset($_SESSION['toastr']);
endif;
?>



<div class="container">
  <h2 class="trending-products"> Products Based on Category</h2>
  <div class="container mt-5 d-flex flex-wrap" id="card-container">
    <?php
if(mysqli_num_rows($catResult) == 0) {
    echo '<h1>There are no product of this category</h1>';
    }
else{

    while ($row = mysqli_fetch_assoc($catResult)) {
      $product_name = $row['product_name'];
      $price = $row['product_price'];
      $product_id = $row['product_id'];
      $image = $row['product_image'];
      ?>
      <div class="col-md-3">
        <div class="wsk-cp-product">
          <a href="getProductDetails.php?product_id=<?php echo ($product_id) ?>" style="text-decoration: none;">
            <div class="wsk-cp-img">
              <img src="uploads/<?php echo ($image) ?>" alt="Product" class="img-responsive" />
            </div>
            <div class="wsk-cp-text">
              <div class="category"></div>
              <div class="title-product">
                <h3>
                  <?php echo ($product_name) ?>
                </h3>
              </div>
              <div class="card-footer">
                <div class="wcf-left"><span class="price"> Rs.
                    <?php echo ($price) ?>
                  </span></div>
                <div class="wcf-right"><a href="#" class="buy-btn" onclick="setUrl()" id="counter-value"><i
                      class="bi bi-cart"></i></a></div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <?php
    }
}

    ?>
  </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
  let counter = 1;

  const counterValue = document.getElementById('counter-value');
  function setUrl() {
    window.location.href = 'backend/addToCartApi.php?product_id=<?php echo ($product_id) ?>&qty=' + counter;
  }
</script>
<?php
include "components/footer.php";
?>