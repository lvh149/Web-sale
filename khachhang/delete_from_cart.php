<?php 

session_start();
require 'check_login_cus.php';

$id = $_GET['id'];
unset($_SESSION['cart'][$id]);

header('location:view_cart.php');

