<?php 

if (empty($_SESSION['id_cus'])) {
	header('location:signin.php');
	exit();
}