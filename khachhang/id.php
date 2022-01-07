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
	 <img height="100"  src="admin/products/photos/<?php echo $each['photo'] ?>">
	<a><div class="name"><?php echo $each['name'] ?></div></a>
	<div class="prices">Free</div>
	<p><?php echo $each['description'] ?></p>	
		
</div>