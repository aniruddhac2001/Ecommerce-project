<?php
session_start();
header('Location:Login.php');
session_destroy();
header('Location:Login2.php');
?>