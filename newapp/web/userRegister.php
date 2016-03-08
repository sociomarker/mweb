<?php
	include_once "../lib/sm-connection.php";
	include_once "../lib/sm-constant.php";
	include_once "../lib/web.php";
	
	if(isset($_GET['tag'])&& !empty($_GET['tag']))
{
    $tag = $_GET['tag'];
    if($tag=='isAct')
        {
            $id=$_GET['id'];
            $user=ActivateUser($id);
//                echo json_encode($user);
            echo "<html>
    <head>
        <meta charset='UTF-8'>
        <title></title>
    </head>
    <body>
        <h3> Your account has been activated </h3>
    </body>
</html>
";
        }
}
else {
	 $fullname=$_POST['fullname'];
     //$username=$_POST['email'];
     $password = md5($_POST['password']);
     $email = $_POST['email'];
     $phone = $_POST['phone'];
//   $mobile = $_POST['mobile'];
     if(isset($_POST['useraddress'])){
		$useraddress = $_POST['useraddress'];
	 } else {
		$useraddress = ""; 
	 }
	 
     $regsource = $_POST['regsource'];
	 if(isset($_POST['dp'])){
		$dp = $_POST['dp'];
	 } else {
		$dp = ""; 
	 }
     
     $date = time();
	  $created_at = date("Y-m-d H:i:s", $date); 
	 
	 if(isset($_POST['cover'])){
		$cover =$_POST['cover'];
	 } else {
		$cover = ""; 
	 }
	 
     
     if(isset($_POST['dob'])){
		$dob=$_POST['dob'];
     }
     else
     {
         $dob='';
     }
     if(isset($_POST['gender'])){
     $gender=$_POST['gender'];
     } 
     else
     {
         $gender='';
     }
	  $status =isUserExisted($email);
	 // echo json_encode($status);
	  if(is_array($status))
	  {	
	  		if($status[0]['isActive']==0)
	  		{
	  			$response['number'] = 1;
				$response['message']="Please validate your email Id by clicking on Email Activation link sent"
                        . " on your mail. Please check the spam/Junk folder if not found in inbox.";				
				echo json_encode($response);
	  		}
	  		else if($status[0]['isActive']==1){
	  		$response['number'] = 0;
			$response['message']= "User Already Registered";		
			$response['user_id'] = $status[0]['user_id'];
			echo json_encode($response);
		}
	  } 
	  else {
	  		if($regsource==0)
	  		{
	  			$isActive = 0;
	  		}
	  		else {
	  			$isActive = 1; 
	  		}
	  		$data = registeruser($fullname, $password, $email, $phone, $useraddress, $dob, $gender,$regsource,$dp,$cover,$isActive,$created_at);
			$user_id = $data;				
			if(isset($_POST['userinterest']))
			{
			
			$userinterest=$_POST['userinterest'];
				
			if(strlen($userinterest)>=1)
			{
				 $interest=  explode(',', $userinterest);
				//$interest = rtrim($interest, ',');				 
				// print_r( $interest);
				 $userinterest = updateinterestrelation($user_id,$interest);			
			}
			
	  	}
	  		$response['number'] = 2;
			$response['message']= "User Successfully Registered";
			$response['user_id'] = $user_id;
			echo json_encode($response);
	  }
	  if($regsource==0 && $response['number']==2){ 
                        $ActUrl = "http://www.miamia.co.in/newapp/process/userRegister.php?tag=isAct&id=". base64_encode($email);
                        $str="<p pbzloc='70'><span pbzloc='97' style='font-family: georgia,serif'><a href='$ActUrl'> $ActUrl </a></span></p>";
                         $mailBody = "Dear " . $fullname .
                        ", <table align='center' border='0' cellpadding='0' cellspacing='0' pbzloc='26' width='600'>
	<tbody>
		<tr>
			<td>                        
                        <br><br>
                        Thank you for your registration with Mia Mia. We are sure you will enjoy this novice experience of finding new stuff. 
                        <br><br>
                        You are just a step away from completing your registration. <a href='$ActUrl'>Click here</a> or copy page the following link in the browser. 
                        <br>
                       $str
                         <br><br>   
                        Feel free to contact us for any doubts or questions. 

                        <p pbzloc='57'><span pbzloc='88' style='font-family: georgia,serif'>Thank You</span></p>

			<p pbzloc='87'><strong><span style='font-family: georgia,serif'>Team - Miamia.</span> </strong></p>

			<p pbzloc='82'>www.miamia.co.in</p>

			        <a href='https://www.facebook.com/groups/1656672104576949/'><img border='0' height='40' src='http://miamia.co.in/appadmin/img/3.png' width='40' /></a>&nbsp;&nbsp;<a href='https://plus.google.com/103217389500893638880/posts'><img border='0' height='40' src='www.miamia.co.in/appadmin/img/4.png' width='40' /></a>&nbsp;&nbsp;<a href='https://twitter.com/miamiaindia'><img border='0' height='40' src='www.miamia.co.in/appadmin/img/5.png' width='40' /></a>
                                        <p pbzloc='50'>&nbsp;</p>
                          <table border='0' cellpadding='0' cellspacing='0' pbzloc='62' width='598'>
                              <tbody>
                                     <tr>
                                          <td height='25' pbzloc='30' valign='top'><a href='http://www.miamia.co.in'><img border='0' height='128' src='http://miamia.co.in/appadmin/img/finallogo.png' width='128' /></a></td>
                                      </tr>
                              </tbody>
                           </table>
                          </td>
                          </tr>
		
                        </tbody>
                </table>";
                         sendMail($email, "info@miamia.co.in", "Registration confirmation", $mailBody);
                }
                        else if($response['number']==2) {
                            $str="";
                            $email1=  base64_encode($email);
                            //$db->ActivateUser($email1);
                             $mailBody = "Dear " . $fullname .
                        ", <table align='center' border='0' cellpadding='0' cellspacing='0' pbzloc='26' width='600'>
	<tbody>
		<tr>
			<td>                        
                        <br><br>
                        Thank you for your registration with Mia Mia. We are sure you will enjoy this novice experience of finding new stuff. 
                       
                         <br><br>   
                        Feel free to contact us for any doubts or questions. 

                        <p pbzloc='57'><span pbzloc='88' style='font-family: georgia,serif'>Thank You</span></p>

			<p pbzloc='87'><strong><span style='font-family: georgia,serif'>Team - Miamia.</span> </strong></p>

			<p pbzloc='82'>www.miamia.co.in</p>

		    	        <a href='https://www.facebook.com/groups/1656672104576949/'><img border='0' height='40' src='http://miamia.co.in/appadmin/img/3.png' width='40' /></a>&nbsp;&nbsp;<a href='https://plus.google.com/103217389500893638880/posts'><img border='0' height='40' src='www.miamia.co.in/appadmin/img/4.png' width='40' /></a>&nbsp;&nbsp;<a href='https://twitter.com/miamiaindia'><img border='0' height='40' src='www.miamia.co.in/appadmin/img/5.png' width='40' /></a>
                                        <p pbzloc='50'>&nbsp;</p>
                          <table border='0' cellpadding='0' cellspacing='0' pbzloc='62' width='598'>
                              <tbody>
                                     <tr>
                                          <td height='25' pbzloc='30' valign='top'><a href='http://www.miamia.co.in'><img border='0' height='128' src='http://miamia.co.in/appadmin/img/finallogo.png' width='128' /></a></td>
                                      </tr>
                              </tbody>
                           </table>
                          </td>
                          </tr>
                        </tbody>
                </table>";
                sendMail($email, "info@miamia.co.in", "Registration confirmation", $mailBody);
                        }
                        }
	
	header("location: ../../register.php?response=".$response['message']);
?>