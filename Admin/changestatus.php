<?php
include '../config/db.php';
$order_id = $_GET['order_id'];
$status = $_GET['status'];


$sql = "UPDATE `order_details` SET `order_status`='$status' WHERE `order_id`='$order_id'";
$query_result = mysqli_query($conn, $sql);
if($query_result){
    
    session_start();
    $_SESSION['toastr'] = array(
        'type' => 'success', // or 'success' or 'info' or 'warning'
        'message' => 'Status changed',
      );
      header("Location:showallorder.php");
}else{
    session_start();
    $_SESSION['toastr'] = array(
        'type' => 'error', // or 'success' or 'info' or 'warning'
        'message' => 'Status couldnot be changed',
      );
      header("Location:showallorder.php");
}

?>