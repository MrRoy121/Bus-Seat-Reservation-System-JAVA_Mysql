<?php 
 
include "config/config.php";
  
 if($_SERVER['REQUEST_METHOD']=='GET'){
		
		$route  = $_GET['route'];
 
 //creating a query
 $stmt = $conn->prepare("SELECT route, busid, seats, bookedseats, driverid, time, datee FROM tbl_bussend where route ='".$route."' AND seats != bookedseats");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($route, $busid, $seats, $bookedseats, $driverid, $time, $date);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['route'] = $route; 
 $temp['busid'] = $busid; 
 $temp['seatcount'] = $seats; 
 $temp['bookedseats'] = $bookedseats; 
 $temp['driverid'] = $driverid; 
 $temp['time'] = $time; 
 $temp['date'] = $date; 
 array_push($products, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($products);
}


