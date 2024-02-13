<?php
if(isset($_POST['name']) && isset($_POST['mobile'])&& isset($_POST['email'])&& isset($_POST['qualification'])&& isset($_POST['courses'])&& isset($_POST['study_mode']))
{
    // Include the necessary files
    require_once "config.php";
    require_once "validate.php";
  
    $name = validate($_POST['name']);
    $mobile = validate($_POST['mobile']);
	$email = validate($_POST['email']);
    $qualification = validate($_POST['qualification']);
	$courses = validate($_POST['courses']);
    $study_mode = validate($_POST['study_mode']);
	
	$checksql="SELECT * from course_registration where mobile='$mobile'";
	$check=mysqli_fetch_array(mysqli_query($con,$checksql));
	
	
    	if(isset($check))
		{
		 echo "Mobile";
		
		}
		else
		{
			$sql = "insert into course_registration(name, mobile, email, qualification, study_mode, courses) values('$name', '$mobile','$email', '$study_mode', '$qualification', '$courses' )";
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


