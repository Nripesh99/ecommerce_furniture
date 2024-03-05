<?php include "components/navbar.php" ?>
<?php

$product_id = $_GET['product_id'];

$sql = "select * from product_details where product_id='$product_id'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  $product_name = $row['product_name'];
  $price = $row['product_price'];
  $product_id = $row['product_id'];
  $image = $row['product_image'];
  $product_desc = $row['product_desc'];
}


?>




<body>


  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3">
          <img src="uploads/<?php echo $image ?>" alt="" class="card-img-top">
        </div>
      </div>
      <div class="col-md-6">
        <div class="card p-4">

            <h3><?php echo $product_name ?></h3>
            <h3 style="color: black;">Rs.<?php echo $price ?> </h3>
          <div class="container">
            <div class="counter d-flex m-2">
              <button id="increment-btn" class="btn btn-secondary">+</button>
              <div id="counter-value" class="mx-3">1</div>
              <button id="decrement-btn" class="btn btn-secondary">-</button>
            </div>
          </div>
          <div class="container mt-3">
            <button class="btn btn-primary col-5 m-2" onclick="setUrl()">Add to Cart</button>
            <button class="btn btn-danger col-5 m-2" onclick="window.location.href='buynow.php?product_id=<?php echo $product_id ?>&qty='+counter">Buy Now</button>
          </div>
          <hr />
          <div class="productDesc">
            <h4 class="mt-1">Description</h4>
            <p><?php echo $product_desc ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    let counter = 1;

    const counterValue = document.getElementById('counter-value');
    const incrementBtn = document.getElementById('increment-btn');
    const decrementBtn = document.getElementById('decrement-btn');
    

    // To increment the value of counter
    incrementBtn.addEventListener('click', () => {
      counter++;
      counterValue.innerHTML = counter;
    });

    // To decrement the value of counter
    decrementBtn.addEventListener('click', () => {
      if(counter>1){
        counter--;
        counterValue.innerHTML = counter;
      }

    });
    function setUrl(){
      window.location.href='backend/addToCartApi.php?product_id=<?php echo ($product_id) ?>&qty='+counter;
    }
  </script>
</body>

</html>