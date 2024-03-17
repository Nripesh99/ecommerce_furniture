<?php 
session_start();
$_SESSION['toastr'] = array(
    'type' => 'success', // or 'success' or 'info' or 'warning'
    'message' => 'logout',
);
header('location:../userLogin.php');
session_destroy();
?>