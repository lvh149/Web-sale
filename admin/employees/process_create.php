<?php
require '../check_super_admin_login.php'; 


if(!isset($_POST['name']) | !isset($_POST['phone']) | !isset($_POST['gender']) | !isset($_POST['address']) | !isset($_POST['email']) | !isset($_POST['password'])){
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
    header('location:create.php');
    exit;
}

$check_error = false;

if (!preg_match('/^[A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*([ ][A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*)*$/', $_POST['name'] ))
{   
 $check_error = true;
}

if (!preg_match('/^(\+84|0)[1-9]{9}$/', $_POST['phone'] ))
{
 $check_error = true;
}

if($_POST['gender'] == "0" | $_POST['gender'] == "1"){
    $check_error = false;
}else{
    $check_error = true;
}

if (!preg_match('/^[A-Za-z0-9]+@[A-Za-z]+\.[a-z]+$/', $_POST['email'] ))
{
 $check_error = true;
}


if(strlen($_POST['password']) < 6 ){
    $check_error = true;
}

if($check_error){
    $_SESSION['error'] = 'Thêm thất bại';
    header('location:create.php');
    exit();
}


$name = $_POST["name"];
$phone = $_POST["phone"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$password = $_POST["password"];
$level = $_POST["level"];
$address = $_POST["address"];
$working_year =  date("Y");
require_once "../connect.php";

//    $sql = "INSERT INTO manufacturers(name) VALUES ('$name')";
$sql = "INSERT INTO employees(name,phone,gender,email,password,levels,address,working_year)
    VALUES('$name','$phone','$gender','$email','$password','$level','$address','$working_year')";

mysqli_query($connect,$sql);

mysqli_close($connect);
header("location: index.php");


?>