<?php
session_start();

$server = "localhost";
$user = "root";
$password = "";
$db = "coupon";

$conn = mysqli_connect($server,$user,$password,$db);
