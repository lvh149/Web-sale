<style type="style2.css"></style> 
<?php 
$name = $_GET['name'];
$page = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
$sort = 'new';
if(isset($_GET['sort'])){
	$sort = $_GET['sort'];
}


require '../admin/connect.php';

$sql_number = "select products.*
from products
join menu where products.menu_id = menu.id and menu.name like '$name'";
$results = mysqli_query($connect,$sql_number);
$number_results = mysqli_num_rows($results);


$number_results_per_page = 8;
$number_page = ceil($number_results / $number_results_per_page);
$next_page = $number_results_per_page * ($page -1);


switch ($sort) {
	case 'desc':
		$sql = "select products.*
		from products
		join menu where products.menu_id = menu.id and menu.name like '$name'
		order by price desc
		limit $number_results_per_page offset $next_page";


		$result = mysqli_query($connect,$sql);
		break;
	case 'asc':
		$sql = "select products.*
		from products
		join menu where products.menu_id = menu.id and menu.name like '$name'
		order by price asc
		limit $number_results_per_page offset $next_page";


		$result = mysqli_query($connect,$sql);
		break;
	
	default:
		$sql = "select products.*
		from products
		join menu where products.menu_id = menu.id and menu.name like '$name'
		order by id desc
		limit $number_results_per_page offset $next_page";


		$result = mysqli_query($connect,$sql);
		break;
}


?>

	<div id="div_giua">	
		<div class="tong">				
			<div class="loai_san_pham">
				<h2><?php echo $name ?></h2>
			</div>
			
			<select name="slt-sort" id="slt-sort">
				<option value="new" selected>Mới nhất</option>
				<option value="desc">Giá cao</option>
				<option value="asc">Giá thấp</option>
			</select>
			<br><br><br>

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
		</div>
		<br><br><br><br>
		Trang
		<?php for($i=1; $i <=$number_page;$i++){ ?>
			
				<button class="btn-next-page" data-id='<?php echo $i ?>'>
					<?php echo $i ?>
				</button>				
			
		<?php } ?>
	</div>
