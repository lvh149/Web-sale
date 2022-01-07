<?php 

if (empty($_SESSION['id'])) {
	header('location:signin.php');
	exit();
}