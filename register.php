<?php
if(isset($_POST['name'])&& isset($_POST['email'])&& isset($_POST['password'])&& isset($_POST['mobile']))
{
    // Include the necessary files
    require_once "config.php";
    require_once "validate.php";
  
    $name = validate($_POST['name']);
	$email = validate($_POST['email']);
    $password = validate($_POST['password']);
	$mobile = validate($_POST['mobile']);
	
  	$CheckSQL = "SELECT * FROM users WHERE mobile='$mobile'";
	$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 	if(isset($check))
	{
		 echo "Mobile no already Exist";
	}
	else
	{ 
    	$sql = "insert into users (name,email, password,mobile) values('$name','$email', '$password','$mobile')";
    	
		if($con->query($sql))
		{
			echo "success";
	    }
		else 
		{
			echo "failure";
		}
		
	
		
	}
}

?>
<!DOCTYPE html>
<html lang="en">
 <body style="background-color:#2ecc71">
<div class="container-fluid">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-xs-12">
        <form name="insert" action="" method="post">
     <table width="100%"  border="0">
    <tr>
    <th height="62" scope="row">Name </th>
    <td width="71%"><input type="text" name="name" id="name" value=""  class="form-control" required /></td>
  </tr>  
  <tr>
    <th height="62" scope="row">Email id </th>
    <td width="71%"><input type="email" name="email" id="email" value=""  class="form-control" required /></td>
  </tr>
  <tr>
    <th height="62" scope="row">Password </th>
    <td width="71%"><input type="password" name="password" id="password" value=""  class="form-control" required /></td>
  </tr>
<tr>
    <th height="62" scope="row">Mobile Number </th>
    <td width="71%"><input type="text" name="mobile" id="mobile" value=""  class="form-control" required /></td>
  </tr>
 <tr>
    <th height="62" scope="row"></th>
    <td width="71%"><input type="submit" name="submit" value="Submit" class="btn-group-sm" /> </td>
  </tr>
</table>
 </form>
      </div>
    </div>
  </div>
</div>
	</body>
</html>

