<?php 

$search = $_GET['term'];

require '../admin/connect.php';

$sql = "select * from products where name like '%$search%'";
$result = mysqli_query($connect,$sql);

$arr = [];
foreach ($result as $each) {
	$arr[] = [
		'id' => $each['id'],
		'label' => $each['name'],
		'photo' => $each['photo'],
		'price' => $each['price'],
	];
}

echo json_encode($arr);