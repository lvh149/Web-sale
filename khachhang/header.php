<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	
</head>
<body>
	<div id="div_tren">
	<div class="trai">
		<a href="index.php"><img src="img\logo.png" style="width: 100%;height: 100%;"></a>
	</div>

	<div class="giua">
		<?php 
		$search ='';
		if (isset($_GET['search'])) {
			$search =$_GET['search'];
		} 
		?>		 		
		<form style="position: absolute;top:20px;left: 45px;" method="get" action="search.php">
			<?php include 'live_search.php' ?>
			
			<button type="submit" style="height: 40px;">Tìm Kiếm</button>
		</form>
	</div>
	
	<div class="phai">
		
		
		<div class="menu-guest" style="position: absolute;right: 20px;top: 15px;text-align: center;<?php if(!empty($_SESSION['id_cus'])){ ?> display: none; <?php } ?>">			

			<button type="button" data-toggle = "modal" data-target="#modal-signin">Đăng nhập</button>
		</div>
		


		<div class="menu-guest" style="position: absolute;right: 20px;top: 45px;text-align: center;<?php if(!empty($_SESSION['id_cus'])){ ?> display: none; <?php } ?>"
			>		
			<button type="button" data-toggle="modal" data-target="#modal-signup">Đăng ký
			</button>
		</div>


		
		<div class="menu-cus" style="position: absolute;right: 20px;top: 30px;text-align: center;<?php if(empty($_SESSION['id_cus'])){ ?> display: none; <?php } ?>">				
			Chào,
			<a href="user.php">
				<span id="span-name">
					<?php echo $_SESSION['name_cus'] ?? '' ?>
				</span>
			</a>
			<br>
			<a href="signout.php">		
				<span style="color: white;">Đăng xuất</span>

			</a>
		</div>

		<a href="view_cart.php ">
			<div class="menu-cus" style="position: absolute;right: 170px;text-align: center;<?php if(empty($_SESSION['id_cus'])){ ?> display: none; <?php } ?>">				
				<img src="img\giohang.png" style="width: 80px;">
				<br>
				<span style="color: white;">Giỏ hàng</span>
			</div>
		</a>
		

		<a href="view_order.php">					
			<div class="menu-cus" style="position: absolute;right: 300px;top:10px;text-align: center;<?php if(empty($_SESSION['id_cus'])){ ?> display: none; <?php } ?>">				
				<img src="img\tintuc.png" style="width: 85px;">
				<br>
				<span style="color: white;">Xem đơn hàng đã đặt</span>
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

	
<?php if(empty($_SESSION['id_cus'])){
		include 'signup.php'; 
		include 'signin.php';

	} ?>


</body>
</html>

	