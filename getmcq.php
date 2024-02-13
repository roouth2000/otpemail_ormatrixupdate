<?php 
	 require_once('config.php');
//WHERE category =$category
$stmt = $con->prepare("SELECT question,job_title,company_name,experience,salary,location,job_details,company_details FROM quiz ;");

	$stmt->execute();
	
	$stmt->bind_result($question,$job_title,$company_name,$experience,$salary,$location,$job_details,$company_details);
	$products = array(); 
	while($stmt->fetch()){
		$temp = array();
		$temp['question'] = $question;
		$temp['job_title'] = $job_title;
		$temp['company_name'] = $company_name; 
		$temp['experience'] = $experience;
		$temp['salary'] = $salary; 
		$temp['location'] = $location;   	
		$temp['job_details'] = $job_details;
		$temp['company_details'] = $company_details; 
			
		array_push($products, $temp);
	}
	echo json_encode($products);	
?>	