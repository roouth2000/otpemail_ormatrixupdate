<?php
if(isset($_POST['name']) && isset($_POST['mobile'])&& isset($_POST['email'])&& isset($_POST['password']))
{
    // Include the necessary files
    require_once "config.php";
    require_once "validate.php";
  
    $name = validate($_POST['name']);
    $mobile = validate($_POST['mobile']);
	$email = validate($_POST['email']);
    $password = validate($_POST['password']);
	
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
