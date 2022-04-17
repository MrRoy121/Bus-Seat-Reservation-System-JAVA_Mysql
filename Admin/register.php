
<?php
include "config/config.php";

$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
if( $_POST['studentid'] && $_POST['password']  && $_POST['phone'] && $_POST['studentName'] && $_POST['section'] && $_POST['dob'] && $_POST['dept'] && $_POST['email'] && $_POST['route'] && $_POST['semester'] && $_POST['pup'] && $_POST['batch']){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$studentName = $_POST['studentName'];
	$studentid = $_POST['studentid'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$route = $_POST['route'];
	$section = $_POST['section'];
	$dept = $_POST['dept'];
	$semester = $_POST['semester'];
	$pup = $_POST['pup'];
	$batch = $_POST['batch'];
	$sql = $conn->prepare("SELECT * FROM tbl_student WHERE studentid = ?");
	$sql->bind_param("s",$studentid);
	$sql->execute();
	$sql->store_result();

	if($sql->num_rows > 0){
		$response['error'] = false;
		$response['message'] = "User already registered";
	} else{
		$stmt = $conn->prepare("INSERT INTO `tbl_student` (`studentid`,`studentName`, `email`, `phone`, `section`, `dob`, `dept`, `password`,  `route`,  `semester`,  `pickuppoint`,  `batch`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssssssssss", $studentid, $studentName, $email, $phone, $section, $dob, $dept, $password, $route, $semester, $pup, $batch);
		$result = $stmt->execute();
		if($result){
			$response['error'] = false;
			$response['message'] = "User Registered Successfully";
		} else {
			$response['error'] = false;
			$response['message'] = "Cannot complete user registration";
		}
	}
} else{
	$response['error'] = true;
	$response['message'] = "Insufficient Parameters";
}
echo json_encode($response);
}	
?>

<!DOCTYPE html>

<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<div>
				<input type="text" placeholder="studentid" name="studentid"/>
			</div>
			<div>
				<input type="password" placeholder="password" name="password"/>
			</div>
			
			<div>
				<input type="text" placeholder="studentName" name="studentName"/>
			</div>
			<div>
				<input type="text" placeholder="phone" name="phone"/>
			</div>
			
			<div>
				<input type="text" placeholder="section" name="section"/>
			</div>
			<div>
				<input type="text" placeholder="dob" name="dob"/>
			</div>
			<div>
				<input type="text" placeholder="email" name="email"/>
			</div>
			<div>
				<input type="text" placeholder="dept" name="dept"/>
			</div>
			<div>
				<input type="text" placeholder="route" name="route"/>
			</div>
			<div>
				<input type="text" placeholder="batch" name="batch"/>
			</div>
			<div>
				<input type="text" placeholder="semester" name="semester"/>
			</div>
			<div>
				<input type="text" placeholder="pup" name="pup"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>


