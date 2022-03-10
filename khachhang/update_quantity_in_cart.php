<?php 

session_start();
require 'check_login_cus.php';

$id = $_GET['id'];
$type = $_GET['type'];

if (empty($_SESSION['cart'][$id])) {
	header('location:view_cart.php');
	exit();
}


if ($type ==='0') {
	if ($_SESSION['cart'][$id]['quantity'] >1) {
		$_SESSION['cart'][$id]['quantity']--;
	}else {
		unset($_SESSION['cart'][$id]);
	}
}else{
	$_SESSION['cart'][$id]['quantity']++;
}

