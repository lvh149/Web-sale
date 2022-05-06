
<?php 
$id = $_GET['id'];

require '../admin/connect.php';
$sql = "select * from products 
where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

$sql_rating = "select rating_products.*,customers.name from rating_products
join customers on rating_products.customer_id = customers.id			
where product_id = '$id'";
$result_rating = mysqli_query($connect,$sql_rating);


	
?>

<div id="div_giua">
	<div>
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
	</div >
	<div class="duoi">
		<?php
			if(isset($_SESSION['id_cus'])){
			$id_cus=$_SESSION['id_cus'];
			$sql_my_rating="select * from rating_products where product_id = '$id' and customer_id ='$id_cus'";	
			$result_my_rating = mysqli_query($connect,$sql_my_rating);
			$my_rating = mysqli_fetch_array($result_my_rating);
			$number_rows = mysqli_num_rows($result_my_rating);
		?>
		<form method="post" action="process_rating.php">
			<h1>Đánh giá sản phẩm</h1>			
			<fieldset class="rating">
				<input type="hidden" name="product_id" value="<?php echo $id ?>">
				<input type="hidden" name="customer_id" value="<?php echo $_SESSION['id_cus'] ?>">
				<input type="radio" id="star5" name="rating" value="5" <?php if($number_rows ==1){if( $my_rating['rating']=='5'){ ?>checked <?php }} ?>/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
				<input type="radio" id="star4half" name="rating" value="4.5" <?php if($number_rows ==1){if( $my_rating['rating']=='4.5'){ ?>checked <?php }} ?>/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
				<input type="radio" id="star4" name="rating" value="4" <?php if($number_rows ==1){if( $my_rating['rating']=='4'){ ?>checked <?php }} ?>/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
				<input type="radio" id="star3half" name="rating" value="3.5" <?php if($number_rows ==1){if( $my_rating['rating']=='3.5'){ ?>checked <?php }} ?>/><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
				<input type="radio" id="star3" name="rating" value="3" <?php if($number_rows ==1){if( $my_rating['rating']=='3'){ ?>checked <?php }} ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
				<input type="radio" id="star2half" name="rating" value="2.5" <?php if($number_rows ==1){if( $my_rating['rating']=='2.5'){ ?>checked <?php }} ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
				<input type="radio" id="star2" name="rating" value="2" <?php if($number_rows ==1){if( $my_rating['rating']=='2'){ ?>checked <?php }} ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
				<input type="radio" id="star1half" name="rating" value="1.5" <?php if($number_rows ==1){if( $my_rating['rating']=='1.5'){ ?>checked <?php }} ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
				<input type="radio" id="star1" name="rating" value="1" <?php if($number_rows ==1){if( $my_rating['rating']=='1'){ ?>checked <?php }} ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
				<input type="radio" id="starhalf" name="rating" value="0.5" <?php if($number_rows ==1){if( $my_rating['rating']=='0.5'){ ?>checked <?php }} ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
			</fieldset>
			<br><br>
			<textarea style="height: 100px;width: 500px; " name="comment" placeholder="Đánh giá sản phẩm(ghi vài chữ giùm đi)"></textarea>
			<br>
			<button>Đánh giá</button>
		</form>
	<?php } ?>
		<br><br><br>
		
		<table border="1" width="90%">
			<tr>
				<th>Tên người đánh giá</th>
				<th>Số sao</th>
				<th>Bình luận</th>
			</tr>
		<?php foreach ($result_rating as $each){ ?>
			<tr>
				<td><?php echo $each['name'] ?></td>
				<td><?php echo $each['rating'] ?></td>
				<td><?php echo $each['comment'] ?></td>
			</tr>
		<?php } ?>
		</table>
	</div>
</div>
