<?php

session_start();
if (empty($_SESSION['level'])) {
	header('location:../index.php');	
}