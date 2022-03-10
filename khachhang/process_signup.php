<?php 
session_start();
require 'validate/signup_validate.php';


$name = $_POST['name'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];

require '../admin/connect.php';
$sql = "select count(*) from customers
where email = '$email'";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if ($number_rows ==1) {	
	echo 'Trùng email ròi';
	exit;
}

$sql = "INSERT INTO customers(name, phone, gender, address, email, password)
values ('$name', '$phone', '$gender', '$address', '$email', '$password')";
mysqli_query($connect,$sql);

$sql = "select id from customers
where email = '$email'";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];
$_SESSION['id_cus'] = $id;
$_SESSION['name_cus'] = $name;
mysqli_close($connect);

echo 1; 


