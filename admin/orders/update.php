<?php
require '../check_admin_login.php'; 
$id = $_GET["id"];
$status = $_GET["status"];
require_once "../connect.php";
$sql = "UPDATE orders set status=$status where id ='$id'";
mysqli_query($connect,$sql);
mysqli_close();
header('location:index.php');
