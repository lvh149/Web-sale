<?php 
$token = $_GET['token'];
require '../admin/connect.php';
$sql = "select customer_id from forgot_password
where token = '$token'";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) === 0){
	header('location:index.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="process_change_new_password.php" method="post">
		<input type="hidden" name="token" value="<?php echo $token ?>">
		Mật khẩu mới
		<input type="password" name="password">
		<br>
		<button>Đổi mật khẩu</button>
	</form>
</body>
</html>