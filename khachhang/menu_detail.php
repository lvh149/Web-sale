
<style type="text/css"></style>
<?php 
$name = $_GET['name'];
require '../admin/connect.php';
$sql = "select products.*
		from products
		join menu where products.menu_id = menu.id and menu.name like '$name'";

$result = mysqli_query($connect,$sql); ?>

<div id="div_giua">
	<div class="tren">				
	<div class="loai_san_pham">
		<h2><?php echo $name ?></h2>
	</div>
	<?php foreach($result as $each) { ?>
		<div class="san_pham">
			<a href="product.php?id=<?php echo $each['id'] ?>"><img class="san_pham" src="../admin/products/photo/<?php echo $each['photo'] ?>"></a>
			<a><div class="name"><?php echo $each['name'] ?></div></a>
			<div class="prices">Free</div>
			<?php if(!empty($_SESSION['id'])) { ?>
				<a href="add_to_cart.php?id=<?php echo $each['id'] ?>">
					Thêm vào giỏ
				</a>
			<?php } ?>					
		</div>
	<?php } ?>
</div>
</div>