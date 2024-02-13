<?php

if(isset($_POST['otp']) && isset($_POST['password']) && isset($_POST['email'])){
  
    require_once "config.php";
    require_once "validate.php";
  
    $otp = validate($_POST['otp']);
    $password = validate($_POST['password']);
	 $email = validate($_POST['email']);
 
    $checksql = "select * from users where otp='$otp' and email='$email'";
	
	$check=mysqli_fetch_array(mysqli_query($con,$checksql));
   
    //$result = $con->query($sql);
    
    if(isset($check))
		{
		$sql = "UPDATE users SET password = '$password' WHERE email = '$email'";

			if($con->query($sql))
			 {
			   echo "success";
			   		
			  }
			else 
			{
				echo "inset_failure";
			 }
		}
		else
		{
		echo "failure";
		}
		
		//mysqli_close($con);
}
else {
	echo "connection failed";
}

?>