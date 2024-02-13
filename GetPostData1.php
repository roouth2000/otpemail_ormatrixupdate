<?php 
	 require_once('config.php');
//WHERE category =$category
$stmt = $con->prepare("SELECT course_name,study_type,duration,payment FROM tech_courses ;");

	$stmt->execute();
	$stmt->bind_result($course_name,$study_type,$duration,$payment);
	$products = array(); 
	while($stmt->fetch()){
		$temp = array();
		$temp['course_name'] = $course_name;
		$temp['study_type'] = $study_type; 
		$temp['duration'] = $duration;
		$temp['payment'] = $payment; 
			
		array_push($products, $temp);
	}
	echo json_encode($products);
	?>