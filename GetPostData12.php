<?php 
	 require_once('config.php');
//WHERE category =$category
$stmt = $con->prepare("SELECT job_id,job_title,job_company,job_skills FROM job_table ;");

	$stmt->execute();
	$stmt->bind_result($job_id,$title,$company_name,$key_responsibilities);
	$products = array(); 
	while($stmt->fetch()){
		$temp = array();
		$temp['job_id'] = $job_id;
		$temp['job_title'] = $title; 
		$temp['job_company'] = $company_name;
		$temp['job_skills'] = $key_responsibilities; 
			
		array_push($products, $temp);
	}
	echo json_encode($products);
	