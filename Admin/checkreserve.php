<?php 
 
include "config/config.php";
  
 if($_SERVER['REQUEST_METHOD']=='GET'){
		
		$studentid  = $_GET['studentid'];
 
 $stmt = $conn->prepare("SELECT stats FROM tbl_bookinghistory where studentid ='".$studentid."' AND stats ='1'");
 
 $stmt->execute();
 
 $stmt->bind_result($stats);
 $ps = array();
 while($stmt->fetch()){
	
	$temp = [
		'stats'=>$stats
	];
	array_push($ps, $temp);
}
 echo json_encode($ps);
}


