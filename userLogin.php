<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-card {
            margin-top: 5rem;
        }
        .login-head {
            text-align: center;
            margin-bottom: 2rem;
        }
        .card {
            border-radius: 15px;
        }
        #login-btn {
            width: 100%;
        }
    </style>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<!--Toastr link and function -->

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!--Toaster Function -->
 <script>
   function toastrFunction(type = 'success', message = '', closeButton = true) {
     console.log("function called");
     toastr.options = {
       "closeButton": false,
       "debug": false,
       "newestOnTop": false,
       "progressBar": false,
       "positionClass": "toast-top-right",
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

</head>
<body>
    <?php
    session_start();
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
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card login-card">
                    <div class="card-body">
                        <h3 class="login-head">User Sign</h3>
                        <form action="backend/userLoginApi.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="d-grid mb-3">
                                <input type="submit" value="Login" class="btn btn-primary" id="login-btn">
                            </div>
                        </form>
                        <p class="text-center">Don't have an account? <a href="userSignUp.php">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
