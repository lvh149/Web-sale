<?php 
session_start();
if(!isset($_POST['receiver_name']) | !isset($_POST['receiver_phone'])  | !isset($_POST['receiver_address'])){
	$_SESSION['error'] = 'Phải điền đầy đủ thông tin';
	header('location:view_cart.php');
	exit;
}

$check_error = false;

if (!preg_match('/^[A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*([ ][A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*)*$/', $_POST['receiver_name'] ))
{	
 $check_error = true;
}

if (!preg_match('/^(\+84|0)[1-9]{9}$/', $_POST['receiver_phone'] ))
{
 $check_error = true;
}


if($check_error){
	$_SESSION['error'] = 'Đặt hàng thất bại';
	header('location:view_cart.php');
	exit();
}


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
$customer_id = $_SESSION['id_cus'];
$status = 1;

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



header('location:view_cart.php');


