<?php 

session_start();
unset($_SESSION['id_cus']);
unset($_SESSION['name_cus']);
setcookie('remember',null,-1);



header('location:index.php');

