<?php 

function current_url()
{
	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$validURL = str_replace("process_forgot_password.php","",$url);
	return $validURL;
}


$email = $_POST['email'];

require '../admin/connect.php';

$sql = "select id,name from customers
where email ='$email'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) === 1) {
	$each = mysqli_fetch_array($result);
	$id = $each['id'];
	$name = $each['name'];
	$sql = "delete from forgot_password
	where customer_id ='$id'";
	mysqli_query($connect,$sql);
	$token = uniqid();
	$sql = "insert into forgot_password(customer_id,token)
	values('$id','$token')";
	mysqli_query($connect,$sql);

	$link = current_url().'change_new_password.php?token='.$token;
	require 'mail.php';
	$title = "Change New Password";
	$content = "Bấm vào đây để đổi mật khẩu <a href ='$link'>link</a>";
	sendmail($email,$name,$title,$content);


}