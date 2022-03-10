<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
</head>
<body>
	<div id="div_tong">
		<?php include 'header.php' ?>
		<div id="div_giua">

			<?php  
			$id = $_SESSION['id_cus'];
			require '../admin/connect.php';
			$sql = "select * from customers where id = '$id'";
			$result = mysqli_query($connect,$sql);
			$each = mysqli_fetch_array($result);
			?>


			<div class='modal-header'>
				<h1>Thông tin cá nhân</h1>
				<div class="alert alert-danger" id="div-error" style="display: none;">
				</div>
			</div>
			<div class='modal-body'>
				<div class="wrap">
					<form class="login-form" method="post" id="form-user" action="process_change_infor.php">                
						<!--Email Input-->
						<div class="form-group">
							<input type="text" id="name" name="name" class="form-input" placeholder="Nhập tên" value="<?php echo $each['name'] ?>">
						</div>

						<!--Password Input-->
						<div class="form-group">
							<input type="text" id="phone" name="phone" class="form-input" placeholder="Nhập số điện thoại" value="<?php echo $each['phone'] ?>">
						</div>

						<div class="form-group">
							<span style="font-weight: 350;">Giới tính:</span>
							<input type="radio" name="gender" value="1" <?php if($each['gender'] ==1){?> checked <?php  }?> ><span style="font-weight: 350;">Nam</span>
							<input type="radio" name="gender" value="0" <?php if($each['gender'] ==0){?> checked <?php  }?> ><span style="font-weight: 350;">Nữ</span>
						</div>
						<div class="form-group">
							<span style="color: red;" id="error_gender"></span>
						</div>

						<div class="form-group">
							<input type="text" id="address" name="address" class="form-input" placeholder="Nhập địa chỉ" value="<?php echo $each['address'] ?>">
						</div>

						<div class="form-group">
							<input type="email" id="email" name="email" style="background:yellowgreen;" class="form-input" placeholder="email@example.com" value="<?php echo $each['email'] ?>"readonly>
						</div>

						<!--Password Input-->
						<div class="form-group">
							<input type="password" id="password" name="password" class="form-input" placeholder="password" value="<?php echo $each['password'] ?>">
						</div>						
						<!--Login Button-->
						<div class="form-group">                
							<button class="form-button">Cập nhật</button>
						</div>

					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {       
				$("#form-user").validate({            
					rules: {
						"name": {
							required: true,
							maxlength: 15
						}, 
						"email": {
							required: true,
							email:true
						},

						"password": {
							required: true,
							minlength: 8
						},
						"re-password": {
							equalTo: "#password",
							minlength: 8
						},
						"password": {
							required: true,
							minlength: 8
						},
					},
					messages: {
						"name": {
							required: "Bắt buộc nhập tên",
							maxlength: "Hãy nhập tối đa 15 ký tự"
						},
						"email": {
							required: "Bắt buộc nhập email",
							minlength: "Hãy nhập ít nhất 8 ký tự"
						},
						"password": {
							required: "Bắt buộc nhập password",
							minlength: "Hãy nhập ít nhất 8 ký tự"
						},
						"re-password": {
							equalTo: "Hai password phải giống nhau",
							minlength: "Hãy nhập ít nhất 8 ký tự"
						}
					},					
				});

			});
		</script>
		
		<?php include 'footer.php' ?>
	</div>
</body>
</html>