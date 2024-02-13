<?php


if(isset($_POST['Email']) && isset($_POST['otpValue'])){
  
    require_once "config.php";
	 require_once "validate.php";
   
  
    $email = validate($_POST['Email']);
    $otp =validate($_POST['otpValue']);
 
    $checksql = "select * from users where email='$email'";
	
	$check=mysqli_fetch_array(mysqli_query($con,$checksql));
   
    //$result = $con->query($sql);
    
    if(isset($check))
		{
		$sql = "UPDATE users SET otp = '$otp' WHERE email = '$email'";

			if($con->query($sql))
			 {
			   echo "success";
			   		
			  }
			else 
			{
				echo "inset_failure";
			 }
		}		// echo "success";
		
		else
		{
		echo "failure";
		}
		
		//mysqli_close($con);
}
else {
	//echo "connection failed";
	
}

?>