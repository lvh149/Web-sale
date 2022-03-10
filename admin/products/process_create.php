<?php
require '../check_admin_login.php'; 


if(!isset($_POST['name']) | !isset($_POST['price']) | !isset($_POST['desc']) | $_POST['manu_id'] =='-1' | $_POST['menu_id'] =='-1'){
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
    header('location:create.php');
    exit;
}

$check_error = false;

if (!preg_match('/^[A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đa-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ0-9]*([ ][A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đa-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ0-9]*)*$/', $_POST['name'] ))
{   
 $check_error = true;
}

if (!preg_match('/^[1-9][0-9]*$/', $_POST['price'] ))
{   
 $check_error = true;
}


$check = getimagesize($_FILES["photo"]["tmp_name"]);
if($check == false) {
    $check_error = true;
} 




if($check_error){
    $_SESSION['error'] = 'Thêm thất bại';
    header('location:create.php');
    exit();
}


$name = $_POST["name"];
$photo= $_FILES["photo"];
$price = $_POST["price"];
$desc = $_POST["desc"];
$manu_id = $_POST["manu_id"];
$menu_id = $_POST["menu_id"];
$folder = 'photo/';
$file_exten = explode('.',$photo["name"])[1];
$file_name = time().'.'. $file_exten;
$path_file = $folder .$file_name;

move_uploaded_file($photo["tmp_name"], $path_file);


require_once "../connect.php";
$sql = "INSERT INTO products(name,photo,price,description,manufacturer_id,menu_id)
VALUES ('$name','$file_name','$price','$desc','$manu_id','$menu_id')";

mysqli_query($connect,$sql);
mysqli_close($connect);
header("location: index.php");

?>