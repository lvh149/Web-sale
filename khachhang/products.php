<?php 

require '../admin/connect.php';
$sql = "select * from products  
order by products.id desc limit 4";

$sql_phone = "select products.*
from products
join menu where products.menu_id = menu.id and menu.name like '%ĐIỆN THOẠI%'
order by products.price desc limit 4";


$sql_laptop = "select products.*
from products
join menu where products.menu_id = menu.id and menu.name like '%LAPTOP%'
order by products.price desc limit 4";

$result = mysqli_query($connect,$sql);
$result_phone = mysqli_query($connect,$sql_phone);
$result_laptop = mysqli_query($connect,$sql_laptop);
?>

<div id="div_giua">
	<div class="tren">
		<div class="loai_san_pham">
			<h2>SẢN PHẨM MỚI</h2>
		</div>
		<?php foreach($result as $each) { ?>
			<div class="san_pham">
				<a href="product.php?id=<?php echo $each['id'] ?>"><img class="san_pham" src="../admin/products/photo/<?php echo $each['photo'] ?>"></a>
				<a><div class="name"><?php echo $each['name'] ?></div></a>
				<div class="prices"><?php echo number_format($each['price'], 0, ',', '.') ?> VND</div>
				
				<?php if(!empty($_SESSION['id_cus'])) { ?> 
					<br>
					<button data-id='<?php echo $each['id'] ?>'
							class='btn-add-to-cart'
					>
						Thêm vào giỏ hàng
					</button>
				<?php }else{ ?>
					<button type="button" data-toggle = "modal" data-target="#modal-signin">Thêm vào giỏ hàng</button>
				<?php } ?>				
			</div>
		<?php } ?>
	</div>
	<div class="giua">				
		<div class="loai_san_pham">
			<h2>ĐIỆN THOẠI</h2>
		</div>
		<?php foreach($result_phone as $each) { ?>
			<div class="san_pham">
				<a href="product.php?id=<?php echo $each['id'] ?>"><img class="san_pham" src="../admin/products/photo/<?php echo $each['photo'] ?>"></a>
				<a><div class="name"><?php echo $each['name'] ?></div></a>
				<div class="prices"><?php echo number_format($each['price'], 0, ',', '.') ?> VND</div>
				<?php if(!empty($_SESSION['id_cus'])) { ?> 
					<br>
					<button data-id='<?php echo $each['id'] ?>'
							class='btn-add-to-cart'
					>
						Thêm vào giỏ hàng
					</button>
				<?php }else{ ?>
					<button type="button" data-toggle = "modal" data-target="#modal-signin">Thêm vào giỏ hàng</button>
				<?php } ?>					
				</div>
			<?php } ?>
		</div>
		
		<div class="duoi">
			<div class="loai_san_pham">
				<h2>LAPTOP</h2>
			</div>
			<?php foreach($result_laptop as $each) { ?>
				<div class="san_pham">
					<a href="product.php?id=<?php echo $each['id'] ?>"><img class="san_pham" src="../admin/products/photo/<?php echo $each['photo'] ?>"></a>
					<a><div class="name"><?php echo $each['name'] ?></div></a>
					<div class="prices"><?php echo number_format($each['price'], 0, ',', '.') ?> VND</div>
	
					<?php if(!empty($_SESSION['id_cus'])) { ?> 
					<br>
					<button data-id='<?php echo $each['id'] ?>'
							class='btn-add-to-cart'
					>
						Thêm vào giỏ hàng
					</button>
				<?php }else{ ?>
					<button type="button" data-toggle = "modal" data-target="#modal-signin">Thêm vào giỏ hàng</button>
				<?php } ?>						
				</div>
			<?php } ?>
		</div>		
	</div>

