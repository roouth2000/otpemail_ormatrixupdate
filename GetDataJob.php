<?php 
	 require_once('config.php');
//WHERE category =$category
$stmt = $con->prepare("SELECT job_id,job_title,company_logo,company_name,experience,salary,location,job_details,company_description,education_qualification,company_address,job_skills,contact,employment_type,job_role,employer_name,designation FROM job_table ;");

	$stmt->execute();
	
	$stmt->bind_result($job_id,$job_title,$company_logo,$company_name,$experience,$salary,$location,$job_details,$company_details,$education_qualification,$company_address,$job_skills,$contact,$employment_type,$job_role,$employer_name,$designation );
	$products = array();
	 
	while($stmt->fetch()){
		$temp = array();
		$temp['job_id'] = $job_id;
		$temp['job_title'] = $job_title;
		$temp['company_logo'] = $company_logo;
		$temp['company_name'] = $company_name; 
		$temp['experience'] = $experience;
		$temp['salary'] = $salary; 
		$temp['location'] = $location;   	
		$temp['job_details'] = $job_details;
		$temp['company_description'] = $company_details; 
		$temp['education_qualification'] = $education_qualification;
		$temp['company_address']= $company_address;
		$temp['job_skills']= $job_skills;
		$temp['contact']= $contact;
		$temp['employment_type']= $employment_type;
		$temp['job_role']= $job_role;
		$temp['employer_name']= $employer_name;
		$temp['designation']= $designation;
		array_push($products, $temp);
	}
	echo json_encode($products);	
?>	