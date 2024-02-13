<?php
if(isset($_POST['job_id']))
{
    // Include the necessary files
    require_once "config.php";
    require_once "validate.php";
  
    $job_id = validate($_POST['job_id']);
    
	$checksql="SELECT * from users where email='$email'";
	$check=mysqli_fetch_array(mysqli_query($con,$checksql));
	
	
    	if(isset($check))
		{
		 echo "email";
		
		}
		else
		{
			$sql = "insert into users (name, mobile, email, password) values('$name', '$mobile','$email', '$password')";
			if($con->query($sql))
			{
			echo "success";
			}else 
			{
				echo "failure";
			}
		}
		mysqli_close($con);
}
?>
