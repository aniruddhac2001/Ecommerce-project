<?php
include ('googlesign.php');

$username=$_POST['username'];
$userid=$_POST['userid'];
$emailid=$_POST['emailid'];
$userimage=$_POST['imageurl'];

$query="insert into google(username,userid,emailid,imageurl) values('$username','$userid','$emailid','$userimage')";

mysqli_query($conn, $query);

?>