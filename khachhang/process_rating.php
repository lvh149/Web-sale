<?php 

$rating = $_POST['rating'];
$comment = $_POST['comment'];
$product_id =$_POST['product_id'];
$customer_id = $_POST['customer_id'];



require '../admin/connect.php';

$sql = "select count(*) from rating_products
where product_id = '$product_id' and customer_id ='$customer_id'";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];
if ($number_rows == 1) {	
	$sql ="update rating_products
	set 
	rating = '$rating',
	comment='$comment'
	where product_id = '$product_id' and customer_id ='$customer_id'";
}else{
	$sql ="insert into rating_products(product_id,customer_id,rating,comment)
	values('$product_id','$customer_id','$rating','$comment')";
}

mysqli_query($connect,$sql);
mysqli_close($connect);
header("location:product.php?id=$product_id");