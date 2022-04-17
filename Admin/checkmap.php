<?php
include "config/config.php";
 
if($_SERVER['REQUEST_METHOD']=='GET'){
		$route  = $_GET['route'];
    $slot = $_GET['slot'];
$webchrz = array(); 
$sql = "Select point, time from tbl_point where route='".$route."' and slot='".$slot."'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($point, $time);
while($stmt->fetch()){
	
	$temp = [
		'point'=>$point,
		'time'=>$time
	];
	array_push($webchrz, $temp);
}
echo json_encode($webchrz);
}

