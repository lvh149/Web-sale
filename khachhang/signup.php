<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
	
	session_start();
	if (isset($_SESSION['error'])) {
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
	?>
	
<form method="post" action="process_signup.php" >
	<h1>Form đăng ký</h1>
	Tên
	<input type="text" id="name" name="name">
	<span id="error_name">
		
	</span>
	<br>
	Số điện thoại
	<input type="text" id="phone" name="phone">
	<span id="error_phone"></span>
	<br>
	Giới tính
	<input type="radio" name="gender" value="1">Nam
	<input type="radio" name="gender" value="0">Nữ
	<span id="error_gender"></span>
	<br>
	Địa chỉ
	<input type="text" id="address" name="address">
	<span id="error_address"></span>
	<br>
	Email
	<input type="email" id="email" name="email">
	<span id="error_email"></span>
	<br>
	Mật khẩu
	<input type="password" id="password" name="password">
	<span id="error_password"></span>
	<br>
	<button onclick="return check()">Đăng ký</button>
</form>
<?php require 'validate/signup_validate.js' ?>
</body>
</html>