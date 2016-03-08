<?php
function getByCat($cat){
		
	    //! Message Loggin
        comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
        * Check if the database Connection is failed
        */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }
	    
		//! Query
        $sQuery = "SELECT 'singleent' as source_table, `ent_id` as `id`, `owner_id`, `category_id`, `ent_name` as `name`, `ent_details` as `details` FROM `singleent`  WHERE  `category_id` = '$cat' 
            
            UNION

            SELECT 'ownerservice' as source_table, `service_id` as `id`, `owner_id`, `category_id`, `service_name` as `name`, `service_details` as `details` FROM `ownerservice` as  source_table1 WHERE `category_id` = '$cat' 
        ;";
        //! Executing the query
        $rResultSet = mysqli_query( $rConnection, $sQuery);

         //! Closing the connections
        dbConnectionClose($rConnection);

        /*!
         *  Check If the Query executed properly
         */
        if($rResultSet !='') {
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            $aData = array();

            //! retrieve the result from the result set
            while($aRow = mysqli_fetch_assoc($rResultSet)) {
                $aData[] = $aRow;
            }

            comment_message_log('End of Function : '. __FUNCTION__);
            return $aData;
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }
}

function getCat($cat){
	        //! Message Loggin
        comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
        * Check if the database Connection is failed
        */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }

        //! Query
        $sQuery = "SELECT * FROM `category` WHERE `category_id` = '$cat' AND `show_in_app` = 1";
        //! Executing the query
        $rResultSet = mysqli_query( $rConnection, $sQuery);

         //! Closing the connections
        dbConnectionClose($rConnection);

        /*!
         *  Check If the Query executed properly
         */
        if($rResultSet !='') {
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            $aData = array();

            //! retrieve the result from the result set
            while($aRow = mysqli_fetch_assoc($rResultSet)) {
                $aData[] = $aRow;
            }

            comment_message_log('End of Function : '. __FUNCTION__);
            return $aData;
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }
}


function getAllCat(){
	    //! Message Loggin
        comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
        * Check if the database Connection is failed
        */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }

        //! Query
        $sQuery = "SELECT * FROM `category` WHERE `show_in_app` = 1";
        //! Executing the query
        $rResultSet = mysqli_query( $rConnection, $sQuery);

         //! Closing the connections
        dbConnectionClose($rConnection);

        /*!
         *  Check If the Query executed properly
         */
        if($rResultSet !='') {
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            $aData = array();

            //! retrieve the result from the result set
            while($aRow = mysqli_fetch_assoc($rResultSet)) {
                $aData[] = $aRow;
            }

            comment_message_log('End of Function : '. __FUNCTION__);
            return $aData;
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }
}

function search(){
	
		//! Message Loggin
        comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
        * Check if the database Connection is failed
        */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }

        //! Query
        $sQuery = "SELECT singleent FROM countries WHERE country LIKE :$term";
        //! Executing the query
        $rResultSet = mysqli_query( $rConnection, $sQuery);

         //! Closing the connections
        dbConnectionClose($rConnection);

        /*!
         *  Check If the Query executed properly
         */
        if($rResultSet !='') {
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            $aData = array();

            //! retrieve the result from the result set
            while($aRow = mysqli_fetch_assoc($rResultSet)) {
                $aData[] = $aRow;
            }

            comment_message_log('End of Function : '. __FUNCTION__);
            return $aData;
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }	
}

function registeruser($fullname, $password, $email, $phone, $useraddress, $dob, $gender,$regsource,$dp,$cover,$isActive,$created_at)
	{
		comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
         * Check if the database Connection is failed
         */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }

        //! Query
        $sQuery = "INSERT INTO `user` (`user_id`,`full_name`, `pass`,`email_id`, `phone` ,`isActive`,`user_address`,`created_at`,`dob`,`gender`,`regsource`,`dp`,`cover`) VALUES (NULL, '$fullname','$password','$email','$phone','$isActive','$useraddress', '$created_at','$dob','$gender','$regsource','$dp','$cover');";

        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
            $user_id = mysqli_insert_id($rConnection);

            //! Closing the connections
            dbConnectionClose($rConnection);

				
            //! Message Login
            comment_message_log('Query Executed Successfully.::: user_id=$user_id::: '.$sQuery);
            comment_message_log('End of Function : '. __FUNCTION__);
            return $user_id;
        } else {
            comment_message_log('Query Execution failed. ::: '. $sQuery .' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            //! Closing the connections
            dbConnectionClose($rConnection);

            return E00100;
        }
	}
	
	function userindb($email,$pass)
	{
		 //! Message Loggin
        comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
        * Check if the database Connection is failed
        */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }

        //! Query
        $sQuery = "SELECT * FROM `user` WHERE email_id='".$email."' AND pass='".md5($pass)."' ;";

        //! Executing the query
        $rResultSet = mysqli_query( $rConnection, $sQuery);

         //! Closing the connections
        dbConnectionClose($rConnection);
		  
        /*!
         *  Check If the Query executed properly
         */
        if($rResultSet !='') {
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            $aData = array();
				$no_of_rows=mysqli_num_rows($rResultSet);
				if($no_of_rows<1){
					return false;
				}
				else{
            //! retrieve the result from the result set
            while($aRow = mysqli_fetch_assoc($rResultSet)) {
                $aData[] = $aRow;
            }

            comment_message_log('End of Function : '. __FUNCTION__);
            return $aData;
         }
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }	
	}
	
	function updateinterestrelation($user_id,$interest)
	{
			//! Message Loggin
        comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
         * Check if the database Connection is failed
         */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }

        //! Query
        foreach($interest as $point){
        		$sQuery = "INSERT INTO `userinterest` (`user_id`,`int_id`) VALUES ('$user_id', '$point');";
			
        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
           mysqli_insert_id($rConnection);

            //! Closing the connections
           //  dbConnectionClose($rConnection);

					
            //! Message Login
            comment_message_log('Query Executed Successfully.::: owner_id = $owner_id ::: '.$sQuery);
            comment_message_log('End of Function : '. __FUNCTION__);
        } else {
            comment_message_log('Query Execution failed. ::: '. $sQuery .' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            //! Closing the connections
            //dbConnectionClose($rConnection);

           // return E00100;
        }
	
		}
	}
		
function sendMail($to, $from, $subject, $message) {
    try {

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= 'From:' . $from . ' <info@miamia.co.in>' . "\r\n";
        ini_set("sendmail_from", "info@miamia.co.in");
  
        ini_set("SMTP", "mail.miamia.co.in");
        // echo '<br> Before New mailer';

        require_once("class.phpmailer.php");
        require_once("class.smtp.php");
        $mail = new PHPMailer(true);

        $mail->IsSMTP();  // telling the class to use SMTP
        $mail->Host     = "mail.miamia.co.in"; // SMTP server

        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->Port = 25;                     // set the SMTP port for the GMAIL server
        $mail->Username = "info@miamia.co.in"; // SMTP account username
        $mail->Password = "justdoit1988"; // SMTP account password
        $mail->From = "info@miamia.co.in";
       // $mail->SMTPSecure = 'tls';

        $mail->AddAddress($to);
       // $mail->AddAddress($to);
        $mail->AddBCC("umeshnig@gmail.com");
        $mail->SetFrom('info@miamia.co.in', $from);
        $mail->AddReplyTo("info@miamia.co.in", $from);
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->WordWrap = 50;

// }//To be commented IF below (Send mail ) is uncommented
        if (!$mail->Send()) {
            echo 'Message was not sent.';
            echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
//            echo $message;
            
        }
    } catch (Exception $ex) {

        echo'EXCEPTION <br>';
        echo '<br>Caught exception: ' . $ex->getMessage() . "\n";
    }
}
	
	function isUserExisted($email)
	{
		//! Message Loggin
        comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
        * Check if the database Connection is failed
        */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }

        //! Query
        $sQuery = "SELECT * FROM `user` WHERE email_id='$email';";

        //! Executing the query
        $rResultSet = mysqli_query( $rConnection, $sQuery);

         //! Closing the connections
        dbConnectionClose($rConnection);
		  
        /*!
         *  Check If the Query executed properly
         */
        if($rResultSet !='') {
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            $aData = array();
				$no_of_rows=mysqli_num_rows($rResultSet);
				if($no_of_rows<1)
				{
					return true;	
				}
				else{
            //! retrieve the result from the result set
            while($aRow = mysqli_fetch_assoc($rResultSet)) {
                $aData[] = $aRow;
   			
            comment_message_log('End of Function : '. __FUNCTION__);
            return $aData;
         }
      }
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }
	}
	
	function ActivateUser($id)
	{
		comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
         * Check if the database Connection is failed
         */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }
			 $id= base64_decode($id);
        //! Query
        $sQuery = "UPDATE `user` SET isActive=1 WHERE `email_id`='$id' ;";
        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
            

            //! Closing the connections
            dbConnectionClose($rConnection);

			
            //! Message Login
            comment_message_log('Query Executed Successfully.::: owner_id = $owner_id ::: '.$sQuery);
            comment_message_log('End of Function : '. __FUNCTION__);
        } else {
            comment_message_log('Query Execution failed. ::: '. $sQuery .' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            //! Closing the connections
            dbConnectionClose($rConnection);

            return E00100;
        }
	}
function storePassword($randompassword, $email)
	{	
		comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
         * Check if the database Connection is failed
         */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }
			 //$email= base64_decode($email);
        //! Query
        $sQuery = "UPDATE `user` SET pass='".md5($randompassword)."' WHERE `email_id`='$email' ;";
        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
            

            //! Closing the connections
            dbConnectionClose($rConnection);

			
            //! Message Login
            comment_message_log('Query Executed Successfully.::: owner_id = $owner_id ::: '.$sQuery);
            comment_message_log('End of Function : '. __FUNCTION__);
        } else {
            comment_message_log('Query Execution failed. ::: '. $sQuery .' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            //! Closing the connections
            dbConnectionClose($rConnection);

            return E00100;
        }			
	
	}
?>