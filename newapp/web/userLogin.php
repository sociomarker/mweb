<?php
	include_once "../lib/sm-connection.php";
	include_once "../lib/sm-constant.php";
	include_once "../lib/web.php";
	
	$email =$_POST['email'];
	$pass =$_POST['password'];
	//echo "asnbcfd";
	$check = userindb($email,$pass);
	$reponse = array();
	if($check==false){
		$response['number'] = 0;
		$response['message']= "User Not Registered";		
		echo json_encode($response);
		}
	else {
		//echo  "xdkfjdkvmdk"; 
		if($check[0]['isActive']==0){
			$response['number'] = 1;
			$response['message']= "Please validate your email Id by clicking on Email Activation link sent"
                        . " on your mail. Please check the spam/Junk folder if not found in inbox.";		
			echo json_encode($response);
			}		
		else if($check[0]['isActive']==1)
		{
			@session_start();
			
			$_SESSION['flag'] = 1;
			$_SESSION['id'] = $check[0]['user_id'];
			$_SESSION['email'] = $check[0]['email_id'];
			$_SESSION['name']=$check[0]['full_name'];
			$_SESSION['address']=$check[0]['user_address'];		
			$_SESSION['dob']=$check[0]['dob'];
			$_SESSION['gender']=$check[0]['gender'];
			$_SESSION['dp']=$check[0]['dp'];
			$_SESSION['cover']=$check[0]['cover'];
			$response['message'] = "Login Successful";
			$response['number']=2;
			
			//print_r ($check);
			echo json_encode($response);
		}
	}
	
	header("location: ../../login.php?response=".$response['message']);
?>
