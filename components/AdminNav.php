<?php
include "../config/db.php";
session_start();

if (isset($_SESSION['toastr'])):
  $toastr = $_SESSION['toastr'];
  ?>
  <script>
    toastrFunction('<?php echo $_SESSION['toastr']['type']; ?>', '<?php echo $_SESSION['toastr']['message']; ?>');
  </script>
  <?php
  unset($_SESSION['toastr']);
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    <?php include "../Assets/style.css" ?>
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <!--Toaster Function -->

  <script>
    function toastrFunction(type = 'success', message = '', closeButton = true) {
      console.log('function called');
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      switch (type) {
        case 'success':
          toastr.success(message);
          break;
        case 'error':
          toastr.error(message);
          break;
        case 'info':
          toastr.info(message);
          break;
        case 'warning':
          toastr.warning(message);
          break;
        default:
          toastr.error("Error aayo");
          break;
      }

    }
  </script>
  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary py-3" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand ml-5" href="/ecommerce_furniture">
        House</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="width:80%;">
        <ul class="navbar-nav ms-auto mb-2 mx-4 mb-lg-0">
          <!-- <li class="nav-item me-5">
            <form class="d-flex align" role="search" style="width: 40rem;" action="searchResult.php" method="post">
              <input class="form-control me-2 ms-5 " name="search" style="width:90%" type="search" placeholder="Search"
                aria-label="Search">
              <button class="btn btn-primary" type="submit">Search</button>
            </form>
          </li> -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/Ecommerce">Home</a></li>
            <li><a class="nav-link active" href="showallorder.php"> Orders</a>
            <li><a class="nav-link active" href="showallproduct.php"> Product</a>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if (isset($_SESSION['username'])) { ?>
                <?php echo ($_SESSION['username']) ?>
              <?php } else { ?>
                Login
              <?php } ?>
            </a>
            <ul class="dropdown-menu">
              <?php if (isset($_SESSION['username'])) { ?>

              <?php } ?>
              <li><a class="dropdown-item" href="backend/logoutApi.php">Logout</a></li>
            </ul>
          </li>
        </ul>


      </div>
    </div>
    <?php


    ?>
  </nav>