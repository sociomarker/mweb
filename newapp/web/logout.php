<?php

@session_start();

$_SESSION['id'] = "";
$_SESSION['email'] = "";
$_SESSION['name'] = "";
$_SESSION['address'] = "";
$_SESSION['dob'] = "";
$_SESSION['gender'] = "";
$_SESSION['dp'] = "";
$_SESSION['cover'] = "";

unset($_SESSION['flag']);



$_flag = 0;

session_destroy();

$_flag='';



if($_flag == ''){

  header("location: ../../index.php?logout=1");

}

?>