<?php
	include '../classes/Admin.php';
?>
<?php
	 $admin=new Admin();
	 if($_SERVER['REQUEST_METHOD']=='POST'){
	 	$email=$_POST["email"];
	 	$password=$_POST["password"];
	 	$rpassword=$_POST["rpassword"];
	 	$pin=$_POST["pin"];
	 	$resetpassword=$admin->resetPassword($email,$pin, $password,$rpassword);
	 }
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<style>
	#content h1:before, #content h1:after{
		width: 22%;
	}
	.success{
		color: green;
		font-size:15px;
		font-weight: bold;
	}
	.error{
		color: red;
		font-size:15px;
		font-weight: bold;
	}
</style>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Change Password</h1>
			<span>
				<?php
					if(isset($resetpassword)){
						echo $resetpassword;
					}
				?>
			</span>
			<div>
				<input type="text" placeholder="Enter Your Email" name="email"/>
			</div>
			<div>
				<input type="text" placeholder="Enter Pin Number" name="pin"/>
			</div>
			<div>
				<input type="text" placeholder="New Password" name="password"/>
			</div>
			<div>
				<input type="password" placeholder="Repeat Password" name="rpassword"/>
			</div>
			<div class="forget">
				<a   style="text-decoration: none;font-size:15px; font-weight: bold; border: 1px solid #d8a239; border-radius: 15px; padding: 5px; background-color: #ffd272;color: #85592e;" href="login.php" name="forget">Login</a>
			</div>
			<div>
				<input type="submit" value="Submit" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Leading University</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>