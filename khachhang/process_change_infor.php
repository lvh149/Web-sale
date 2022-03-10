<?php 
session_start();

if(!isset($_POST['name']) | !isset($_POST['phone']) | !isset($_POST['gender']) | !isset($_POST['address']) | !isset($_POST['email']) | !isset($_POST['password'])){
	$_SESSION['error'] = 'Phải điền chính xác';
	header('location:user.php');
	exit;
}


$name = $_POST['name'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];

$id = $_SESSION['id_cus'];
require '../admin/connect.php';
$sql = "
update customers
set
name = '$name',
phone = '$phone',
gender = '$gender',
address = '$address',
password = '$password'
where id = '$id'";
mysqli_query($connect,$sql);

$sql = "select id,name from customers
where email = '$email'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
$id = $each['id'];
$name1 = $each['name'];
$_SESSION['id_cus'] = $id;
$_SESSION['name_cus'] = $name1;
mysqli_close($connect);
header('location:user.php');
?>