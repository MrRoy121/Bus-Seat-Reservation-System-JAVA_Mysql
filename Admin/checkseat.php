<?php
include "config/config.php";
 
if($_SERVER['REQUEST_METHOD']=='GET'){
		$route  = $_GET['route'];
    $busid = $_GET['busid'];
//if everything is fine then create an array for storing the data 
$webchrz = array(); 

//this is our sql query 
$sql = "Select seat from tbl_seat where route='".$route."' and busid='".$busid."'";

//creating an statment with the query
$stmt = $conn->prepare($sql);

//executing that statment
$stmt->execute();

//binding results for that statment 
$stmt->bind_result($seat);

//looping through all the records
while($stmt->fetch()){
	
	//pushing fetched data in an array 
	$temp = [
		'seat'=>$seat
	];
	
	//pushing the array inside the hero array 
	array_push($webchrz, $temp);
}
//displaying the data in json format 
echo json_encode($webchrz);
}
?>

<form class="form" action="" method="post" enctype="multipart/form-data">
    <table>
            <tr>
                <td>Seat a1</td>
                <td><input type="text" name="route" placeholder="route"/> </td>
            </tr>
            <tr>
                <td>Seat a2</td>
                <td> <input type="text" name="busid" placeholder="busid"/> </td>
            </tr> 
            <tr>
                <td><input class='btn'type="submit" value="submit" /></td>
            </tr>
        </table>
</form>

