<?php
@session_start();

$_flag = '';
$_id = '';
$_email = '';
$_name = '';
$_address = '';
$_dob = '';
$_gender = '';
$_dp = '';
$_cover = '';

if(isset($_SESSION['flag']) && isset($_SESSION['email'])){
	if($_SESSION['flag'] == 1){

		$_flag = 1;
        $_id = $_SESSION['id'];
		$_email = $_SESSION['email'];
		$_name = $_SESSION['name'];
		$_address = $_SESSION['address'];
		$_dob = $_SESSION['dob'];
		$_gender = $_SESSION['gender'];
		$_dp = $_SESSION['dp'];
		$_cover = $_SESSION['cover'];
	
	}
}
?>