<style type="text/css"></style>
<?php 
$id = $_GET['id'];
require '../admin/connect.php';
$sql = "select * from products 
where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result)
?>

<div id="div_giua">
	<a><div class="name"><?php echo $each['name'] ?></div></a>
	<img height="500"  src="../admin/products/photo/<?php echo $each['photo'] ?>">
	<?php if(!empty($_SESSION['id_cus'])) { ?> 
		
		<button style="height: 100px;width: 300px; background: #3f95fb; color:white" data-id='<?php echo $each['id'] ?>'
			class='btn-add-to-cart'
			>
			Thêm vào giỏ hàng
		</button>
	<?php }else{ ?>
		
		<button style="height: 100px;width: 300px; background: #3f95fb; color:white" type="button" data-toggle = "modal" data-target="#modal-signin">Thêm vào giỏ hàng</button>
	<?php } ?>
	<?php if(!empty($_SESSION['id_cus'])) { ?> 
		
		<button style="height: 100px;width: 300px; background: #cd1818; color:white" data-id='<?php echo $each['id'] ?>'
			class='btn-buy'
			>
			Mua ngay
		</button> 
	<?php }else{ ?>
		
		<button style="height: 100px;width: 300px; background: #cd1818; color:white" type="button" data-toggle = "modal" data-target="#modal-signin">Mua ngay</button>
	<?php } ?>		
	<div class="prices"><?php echo number_format($each['price'], 0, ',', '.') ?> VND</div>	<br><br><br><br><br>
	<p><?php echo nl2br($each['description']) ?></p>	
	
</div>
