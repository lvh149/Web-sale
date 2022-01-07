<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

</body>
</html>
<div id="div_tren">
	<div class="trai">
		<a href="index.php"><img src="img\logo.png" style="width: 100%;height: 100%;"></a>
	</div>

	<div class="giua">				
		<form style="position: absolute;top:20px;left: 45px;">
			<input type="text" name="tim_kiem" placeholder="    Nhập tên điện thoại, máy tính, phụ kiện,... cần tìm"
			 style="width: 600px;height: 40px;border-radius: 2px;border: none;font-size: 14px;">
			 
			<button type="submit" style="height: 40px;">Tìm Kiếm</button>
		</form>
	</div>
	
	<div class="phai">
		<?php if(empty($_SESSION['id'])) { ?>
		<a href="signin.php">
			<div style="position: absolute;right: 20px;top: 15px;text-align: center;">			
				
				<span style="color: white;">Đăng nhập</span>
			</div>
		</a>
		<a href="signup.php">
			<div style="position: absolute;right: 20px;top: 45px;text-align: center;">				
				
				<span style="color: white;">Đăng ký</span>
			</div>
		</a>
		<?php }else { ?>	
			<a href="signout.php">
			<div style="position: absolute;right: 20px;top: 30px;text-align: center;">				
				
				<span style="color: white;">Đăng xuất</span>
			</div>
		</a>
		<?php } ?>
		<?php if(!empty($_SESSION['id'])) { ?>				
		<a href="view_cart.php ">
			<div style="position: absolute;right: 150px;text-align: center;">				
				<img src="img\giohang.png" style="width: 80px;">
				<br>
				<span style="color: white;">Giỏ hàng</span>
			</div>
		</a>
		<?php } else{ ?>
		<a href="signin.php ">
			<div style="position: absolute;right: 150px;text-align: center;">				
				<img src="img\giohang.png" style="width: 80px;">
				<br>
				<span style="color: white;">Giỏ hàng</span>
			</div>
		</a>
		<?php } ?>
		<a href="#">					
				<div style="position: absolute;right: 300px;top:10px;text-align: center;">				
				<img src="img\tintuc.png" style="width: 85px;">
				<br>
				<span style="color: white;">Tin tức</span>
			</div>
		</a>
	</div>
	
	<div class="duoi">
		<?php 
			require '../admin/connect.php';
			$sql1 = "select * from menu
			order by menu.id asc";
			$result_menu = mysqli_query($connect,$sql1);
			$sql2 = "select * from manufactures";
			$result_manufacturer = mysqli_query($connect,$sql2);		
		?>
		<?php foreach($result_menu as  $each) { ?>
		<ul>
			<li>
				<a href="menu.php?name=<?php echo $each['name'] ?>" ><?php echo $each['name'] ?></a>				
				<ul>
					<h3>Hãng sản xuất</h3>
					<?php 
						foreach($result_manufacturer as  $each2) { 
						 if($each['id'] == $each2['menu_id']){ 
					?>
					<li>											
						<a href="manufacturer.php?name=<?php echo $each2['name']?> "><?php echo $each2['name']?></a>					
					</li>
					<?php }} ?>						
				</ul>
				
			</li>	
		</ul>
		<?php } ?>	
	</div> 
	
</div>