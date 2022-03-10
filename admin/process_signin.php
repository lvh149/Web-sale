<?php
session_start();
if(!isset($_POST['email']) | !isset($_POST['password'])){
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
    header('location:index.php');
    exit;
}


$check_error = false;

if (!preg_match('/^[A-Za-z0-9]+@[A-Za-z]+\.[a-z]+$/', $_POST['email'] ))
{

 $check_error = true;

}

if(strlen($_POST['password']) < 6 ){
    $check_error = true;

}

if($check_error){
    $_SESSION['error'] = 'Đăng nhập thất bại';
    header('location:index.php');
    exit();
}

$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);
if(isset($_POST["remember"])) {
    $remember =1 ;
}
else {
    $remember =0;
}
require_once "connect.php";
$sql = "SELECT * FROM employees
    WHERE email='$email' and password = '$password'";
$result =mysqli_query($connect, $sql);
$num_row = mysqli_num_rows($result);
if($num_row==1) {
   
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $_SESSION["id"] = $id;
    $_SESSION["name"] = $each['name'];
    $_SESSION['level'] = $each['levels'];
    
    if($remember) {
        $token = uniqid('user_',  true);
        $sql_token = "UPDATE employees 
                set token ='$token' WHERE id= '$id'";
        mysqli_query($connect,$sql_token);
        setcookie('remember',$token,time() + 60*60*24*30);
    }
    header("location: ../admin/root/index.php");
}

?>

