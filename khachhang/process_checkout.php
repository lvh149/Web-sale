<?php 

$receiver_name = $_POST['receiver_name'];
$receiver_phone = $_POST['receiver_phone'];
$receiver_address = $_POST['receiver_address'];
$note = $_POST['note'];

require '../admin/connect.php';
session_start();
require 'check_login_cus.php';
$cart = $_SESSION['cart'];

$total_price = 0;
foreach($cart as $each){
	$total_price += $each['quantity'] * $each['price'];
}
$customer_id = $_SESSION['id'];
$status = 0;

$sql = "INSERT INTO orders (customer_id, receiver_name, receiver_phone, receiver_address, status, note, total_price)
values ('$customer_id', '$receiver_name', '$receiver_phone', '$receiver_address', '$status', '$note', '$total_price')";
mysqli_query($connect,$sql);
$sql = "select max(id) from orders where customer_id = '$customer_id'";

$result = mysqli_query($connect,$sql);
$order_id = mysqli_fetch_array($result)['max(id)'];

foreach($cart as $product_id => $each){
	$quantity = $each['quantity'];
	$sql = "insert into order_product(order_id, product_id, quantity)
	values('$order_id', '$product_id', '$quantity')";

	mysqli_query($connect,$sql);
}
mysqli_close($connect);
unset($_SESSION['cart']);

header('location:index.php');