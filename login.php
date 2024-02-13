<?php

if(isset($_POST['mobile']) && isset($_POST['password'])){
  
    require_once "config.php";
    require_once "validate.php";
  
    $mobile = validate($_POST['mobile']);
    $password = validate($_POST['password']);
 
    $checksql = "select * from users where mobile='$mobile' and password='$password'";
	
	$check=mysqli_fetch_array(mysqli_query($con,$checksql));
   
    //$result = $con->query($sql);
    
    if(isset($check))
		{
		 echo "success";
		
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