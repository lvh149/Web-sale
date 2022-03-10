<?php
require '../check_admin_login.php'; 

$id = $_POST["id"];
if(!isset($_POST['name']) | !isset($_POST['price']) | !isset($_POST['desc']) | $_POST['manu_id'] =='-1' | $_POST['menu_id'] =='-1'){
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
    header("location:update.php?id=$id");
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

if(empty($_FILES["new_photo"])){
$check = getimagesize($_FILES["photo"]["tmp_name"]);
if($check == false) {
    $check_error = true;
}} 


if($check_error){
    $_SESSION['error'] = 'Sửa thất bại';
    header("location:update.php?id=$id");
    exit();
}


$name = $_POST["name"];
$new_photo = $_FILES["new_photo"];
if($new_photo['size'] >0) {
    $folder = 'photo/';
    $file_exten = explode('.',$new_photo["name"])[1];
    $file_name = time().'.'. $file_exten;
    $path_file = $folder .$file_name;
    move_uploaded_file($new_photo["tmp_name"], $path_file);
}
else {
    $file_name= $_POST["photo_old"];
}

$price = $_POST["price"];
$desc = $_POST["desc"];
$manu_id = $_POST["manu_id"];
$menu_id = $_POST["menu_id"];



require_once "../connect.php";
$sql = "UPDATE products 

    SET 
    name= '$name',
    photo= '$file_name',
    price= '$price',
    description= '$desc',
    manufacturer_id  = '$manu_id',
    menu_id = '$menu_id'
    WHERE id = '$id';
    ";

//die($sql);
mysqli_query($connect,$sql);
mysqli_close($connect);
header("location: index.php");

?>
