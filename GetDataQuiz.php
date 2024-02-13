<?php 
	 require_once('config.php');
//WHERE category =$category
$stmt = $con->prepare("SELECT id,question,options1,options2,options3,options4,answer FROM quiz ;");

	$stmt->execute();
	
	$stmt->bind_result($id,$question,$options1,$options2,$options3,$options4,$answer);
	$products = array(); 
	while($stmt->fetch()){
		$temp = array();
		$temp['id'] = $id;
		$temp['question'] = $question;
		$temp['options1'] = $options1;
		$temp['options2'] = $options2; 
		$temp['options3'] = $options3;
		$temp['options4'] = $options4; 
		$temp['answer'] = $answer;   	
		
			
		array_push($products, $temp);
	}
	echo json_encode($products);	
?>	