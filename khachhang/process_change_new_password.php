<?php 


$token = $_POST['token'];
$password = $_POST['password'];

require '../admin/connect.php';

$sql = "select customer_id from forgot_password
where token = '$token'";

$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) === 0){
	header('location:index.php');
	exit();
}

$customer_id = mysqli_fetch_array($result)['customer_id'];
$sql = "update customers
set 
password = '$password'
where
id = '$customer_id'";
mysqli_query($connect,$sql);

$sql= "delete from forgot_password
where token ='$token'";
mysqli_query($connect,$sql);
header('location:signin.php');