<?php 
session_start();
$search = $_GET['search'];

$page = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

require '../admin/connect.php';

$sql_number = "select * from products  
where name like '%$search%'";
$results = mysqli_query($connect,$sql_number);
$number_results = mysqli_num_rows($results);


$number_results_per_page = 8;
$number_page = ceil($number_results / $number_results_per_page);
$next_page = $number_results_per_page * ($page -1);

$sql = "select * from products  
where name like '%$search%'
limit $number_results_per_page offset $next_page";

$result = mysqli_query($connect,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="style2.css">
</head>
<body>
	<div id="div_tong">
		<?php include 'header.php' ?>
		<div id="div_giua">

			<div class="tong">		
				<div class="loai_san_pham">
					<h2>Kết quả tìm kiếm cho từ khoá "<?php echo $search ?>"</h2>
				</div>
				<?php foreach($result as $each) { ?>
					<div class="san_pham">
						<a href="product.php?id=<?php echo $each['id'] ?>"><img class="san_pham" src="../admin/products/photo/<?php echo $each['photo'] ?>"></a>
						<a><div class="name"><?php echo $each['name'] ?></div></a>
						<div class="prices">Free</div>
						<a 
						<?php if(!empty($_SESSION['id_cus'])) { ?> 
							href="add_to_cart.php?id=<?php echo $each['id'] ?>" 
						<?php }else{  ?> 
							href="signin.php" 
							<?php } ?>>
							Thêm vào giỏ
						</a>										
					</div>
				<?php } ?>
			</div>
			Trang
			<?php for($i=1; $i <=$number_page;$i++){ ?>
					<a href="search.php?page=<?php echo $i ?>&search=<?php echo $search ?>">
						<button>
							<?php echo $i ?>
						</button>				
					</a>
			<?php } ?>
		</div>		
		<?php include 'footer.php' ?>
	</div>
</body>
</html>