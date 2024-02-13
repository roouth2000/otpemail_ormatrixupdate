
<?php
if( isset($_POST['mobile'])&& isset($_POST['otp'])){
    // Include the necessary files
    require_once "connreg.php";
    require_once "validate.php";
     
    $mobile = validate($_POST['mobile']);
    $otp = validate($_POST['otp']);
	$to = $mobile;
	$subject = 'Jobs on Active OTP';
	$from = 'jobposting@jobsonactive.com';

    $sql = "UPDATE employee_basic_table SET otp = '$otp' WHERE email = '$mobile'";
    if(!$con->query($sql)){
        echo "failure";
    }else{

// $to = $mobile;
	//$subject = 'Jobs on Active OTP';
	//$from = 'jobposting@jobsonactive.com';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n" . 'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';

$message .= '<p>Dear User, <br><br>Your OTP for reset password to JOBS ON ACTIVE Portal is: '.$otp.' Please do not share this OTP.</p>';
$message .= '<p>Regards, <br>Jobs on Active</p>';
$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    //echo 'Your mail has been sent successfully.';
} //else{
   // echo 'Unable to send email. Please try again.';
//}
				 
		  echo "success";   
       
    }
	
}
?>
