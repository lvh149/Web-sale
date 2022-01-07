<?php 


if(empty($_POST['email']) | empty($_POST['password'])){
	$_SESSION['error'] = 'Phải điền đầy đủ thông tin';
	header('location:signin.php');
	exit;
}


$check_error = false;

if (!preg_match('/^[A-Za-z0-9]+@[A-Za-z]+\.[a-z]+$/', $_POST['email'] ))
{

 $check_error = true;

}

if(strlen($_POST['password']) < 8 ){
	$check_error = true;

}



if($check_error){
	$_SESSION['error'] = 'Đăng nhập thất bại';
	header('location:signin.php');
	exit();
}