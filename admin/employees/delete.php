<?php
require '../check_super_admin_login.php'; 
$id = $_GET["id"];
require_once "../connect.php";

$sql = "DELETE FROM employees WHERE id='$id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
header("location: index.php");
?>