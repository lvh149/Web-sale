<?php 
session_start();

require 'check_login_cus.php';
$id = $_GET['id'];
include_once "../admin/connect.php";

$sql_check_order="select status from orders where orders.id = '$id'";
$result=mysqli_query($connect,$sql_check_order);
$each = mysqli_fetch_array($result);

if ($each['status'] == 1 ) {
	$sql_cancel_order = "UPDATE orders set status='4' where id ='$id'";
	mysqli_query($connect,$sql_cancel_order);
}


mysqli_close($connect);
header("location: view_order.php");