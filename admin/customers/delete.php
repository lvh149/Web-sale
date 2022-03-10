<?php
require '../check_admin_login.php'; 
$id = $_GET["id"];
require_once "../connect.php";
//    $sql = "INSERT INTO manufacturers(name) VALUES ('$name')";
$sql = "DELETE FROM customers WHERE id='$id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
header("location: index.php");
?>
