<style type="style2.css"></style> 
<?php 
$name = $_POST['name'];
$order = $_POST['order'];

$page = 1;
if (isset($_POST['page'])) {
	$page = $_POST['page'];
}

$number_results_per_page = 8;
$next_page = $number_results_per_page * ($page -1);
if (isset($_POST['next_page'])) {
	$next_page = $_POST['next_page'];
}
require '../admin/connect.php';


if ($order == 'new') {
	$sql = "select products.*
	from products
	join menu where products.menu_id = menu.id and menu.name like '$name'
	order by id desc
	limit $number_results_per_page offset $next_page";
	
}else{
	$sql = "select products.*
	from products
	join menu where products.menu_id = menu.id and menu.name like '$name'
	order by price $order
	limit $number_results_per_page offset $next_page";
}
$result = mysqli_query($connect,$sql);
?>

<div class="test">
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




