<?php 
	 require_once('config.php');
//WHERE category =$category
$stmt = $con->prepare("SELECT internship_name,details,total_days,fees FROM internships ;");

	$stmt->execute();
	$stmt->bind_result($course_name,$study_type,$duration,$payment);
	$products = array(); 
	while($stmt->fetch()){
		$temp = array();
		$temp['internship_name'] = $course_name;
		$temp['details'] = $study_type; 
		$temp['total_days'] = $duration;
		$temp['fees'] = $payment; 
			
		array_push($products, $temp);
	}
	echo json_encode($products);
	?>
	