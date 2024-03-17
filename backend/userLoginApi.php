<?php
include '../config/db.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from customer_details";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
    $user_id = $row['customer_id'];
    $db_username = $row['username'];
    $db_password = $row['password'];
    

    if($username==$db_username){
        if(password_verify($password,$db_password)){
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['user_id']=$user_id;
            if($_SESSION['username']==='admin'){

                header('location:../Admin/index.php');
                break;
            }else{
                header('location:../index.php');
                break;
            }
        }else{
            session_start();
            $_SESSION['toastr'] = array(
                'type' => 'error', // or 'success' or 'info' or 'warning'
                'message' => 'Login Failed',
            );
            header('location:../userLogin.php');
        }
    }else{
        session_start();
        $_SESSION['toastr'] = array(
            'type' => 'success', // or 'success' or 'info' or 'warning'
            'message' => 'Welcome',
        );
        header('location:../userLogin.php');
    }
}


?>