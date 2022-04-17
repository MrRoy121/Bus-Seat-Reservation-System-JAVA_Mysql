<?php
	include '../classes/adminLogin.php';
?>
<?php
	 $al=new adminLogin();
	 if($_SERVER['REQUEST_METHOD']=='POST'){
	 	$username=$_POST["username"];
	 	$password=$_POST["password"];
	 	$loginChk=$al->adminLogin($username,$password);
	 }
?>
<style>
	#content h1:before, #content h1:after{
		 
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
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span style="color:red; font-size:18px;">
				<?php
					if(isset($loginChk)){
						echo $loginChk;
					}
				?>
			</span>
			<div>
				<input type="text" placeholder="Username" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="password"/>
			</div>
			<div class="forget">
				<a style="text-decoration: none; font-size:14px; font-weight: bold;" href="forgetpass.php" name="forget">Forget Password?</a>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Leading University</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>