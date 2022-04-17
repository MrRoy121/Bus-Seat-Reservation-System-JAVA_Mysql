<?php
include "config/config.php";
 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
if($_POST['studentid'] && $_POST['password']){


 $studentid = $_POST['studentid'];
 $password = $_POST['password']; 
 
 $stmt = $conn->prepare("SELECT studentid, studentName FROM tbl_student WHERE studentid = ? AND password = ?");
 $stmt->bind_param("ss",$studentid, $password);
 
 $stmt->execute();
 
 $stmt->store_result();
 
 if($stmt->num_rows > 0){
 
 $stmt->bind_result($studentid, $studentName);
 $stmt->fetch();
 
 
 $response['error'] = false; 
 $response['message'] = 'Login successfull'; 
 $response['studentid'] = $studentid; 
 $response['studentName'] = $studentName; 
 }else{
 //if the user not found 
 $response['error'] = false; 
 $response['message'] = 'Invalid ID or password';
 }
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
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>



