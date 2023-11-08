<?php 
session_start();

include 'config.php';

if (isset($_GET['token'])){

    $token = $_GET['token'];

    $updatequery = " UPDATE admin set status = 'active' WHERE token = '$token'";
    
    $query = mysqli_query($conn, $updatequery);

    if($query){
        if(isset($_SESSION['msg'])){
            header('Location:home.php');
        }else{
            $_SESSION['msg'] = "You are logged out";
            header('Location:Login.php');
        }
    }
}


?>