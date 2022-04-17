 <?php
 	$filepath= realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	Session::checkLogin();
?>
<?php
	class adminLogin{
		private $db;
		private $fm;
		public function __construct(){  //object in constructor can be used within the whole class
			$this->db=new Database();
			$this->fm=new Format();
		}
		public function adminLogin($username, $password){

			$username =$this->fm->validation($username);
			$password =$this->fm->validation($password);
			$username= mysqli_real_escape_string($this->db->link, $username);
			$password= mysqli_real_escape_string($this->db->link, $password);

			if(empty($username) || empty($password)){
				$loginmsg="<span class='error'>Username or Password Must Not be Empty</span>";
				return $loginmsg;
			}else{
				$password=md5($password);
				$query="select * from tbl_admin WHERE username='$username' AND  password='$password'";
				$result=$this->db->select($query);
				if($result !=false){
					$value=$result->fetch_assoc();
					Session::set("adminLogin", true);
					Session::set("id", $value['id']);
					Session::set("name", $value['name']);
					Session::set("username", $value['username']);
					Session::set("role", $value['role']);
					header('Location: dashboard.php');
				}else{
					$loginmsg="<span class='error'>Username or Password Mot Matched</span>";
					return $loginmsg;
				}
			}
		}
		 
	}
?>