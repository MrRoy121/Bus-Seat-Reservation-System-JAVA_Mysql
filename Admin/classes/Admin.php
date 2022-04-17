 <?php
 	$filepath= realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class Admin{
		private $db;
		private $fm;
		public function __construct(){  //object in constructor can be used within the whole class
			$this->db=new Database();
			$this->fm=new Format();
		}
		public function resetPassword($email,$pin, $password,$rpassword){
			$email =$this->fm->validation($email);
			$pin =$this->fm->validation($pin);
			$password =$this->fm->validation($password);
			$rpassword =$this->fm->validation($rpassword);
			$email= mysqli_real_escape_string($this->db->link, $email);
			$pin= mysqli_real_escape_string($this->db->link, $pin);
			$password= mysqli_real_escape_string($this->db->link, $password);
			$rpassword= mysqli_real_escape_string($this->db->link, $rpassword);

			if(empty($email) || empty($pin) || empty($password) || empty($rpassword)){
				$msg="<span class='error'>Fields must not be empty</span>";
				return $msg;
			}else if($password != $rpassword){
				$msg="<span class='error'>Password Doesn't Match</span>";
				return $msg;
			}
			else{
				$select="SELECT * from tbl_admin WHERE email='$email' AND pin='$pin'";
				$getUser=$this->db->select($select);
				if($getUser){
					$password=md5($password);
					$query="UPDATE tbl_admin 
					SET 
					password='$password'
					WHERE email='$email' AND pin='$pin'";
					$resetPassword=$this->db->update($query);
					if($resetPassword){
						$msg="<span class='success'>Password Reset Successfully</span>";
						return $msg;
					}else{
						$msg="<span class='success'>Can't reset Password</span>";
						return $msg;
					}
				}else{
						$msg="<span class='error'>Check Email or Pin.</span>";
						return $msg;
					}
				 
			}
		}
		public function profileEdit($data, $file){
			$userid=$this->fm->validation($data['id']);
			$name=$this->fm->validation($data['name']);
		    $username=$this->fm->validation($data['username']);
		    $email=$this->fm->validation($data['email']);
           
            $phone=$this->fm->validation($data['phone']);
            $hometown=$this->fm->validation($data['hometown']);
            $curaddress=$this->fm->validation($data['curaddress']);
            $role=$this->fm->validation($data['role']);
            $pin=$this->fm->validation($data['pin']);

			$userid=mysqli_real_escape_string($this->db->link, $data['id']);
			$name=mysqli_real_escape_string($this->db->link, $data['name']);
            $username=mysqli_real_escape_string($this->db->link, $data['username']);
            $email   =mysqli_real_escape_string($this->db->link, $data['email']);
            $phone   =mysqli_real_escape_string($this->db->link, $data['phone']);
            $hometown   =mysqli_real_escape_string($this->db->link, $data['hometown']);
            $curaddress =mysqli_real_escape_string($this->db->link, $data['curaddress']);
            $role =mysqli_real_escape_string($this->db->link, $data['role']);
            $pin =mysqli_real_escape_string($this->db->link, $data['pin']);
            
            $permitted=array("jpg","png","gif","jpeg");
			$file_name=$file['image']['name']; //foyez.JPG
			$file_size=$file['image']['size'];
			$file_tmp= $file['image']['tmp_name'];

			$div=explode(".", $file_name);
			$file_ext=strtolower(end($div)); //jpg
			$unique_name=substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image="upload/admins/".$unique_name; //uploads/unique_name

			$emailquery="SELECT * from tbl_admin where email='$email' AND id!='$userid'";
			$chkEmail=$this->db->select($emailquery);
			$userQuery="SELECT * from tbl_admin where username='$username'  AND id!='$userid'";
			$chkUsername=$this->db->select($userQuery);
			$idQuery="SELECT * from tbl_admin where email='$email' AND id!='$userid'";
			$chkId=$this->db->select($idQuery);

			if($name=="" || $username=="" ||$phone=="" ||$hometown=="" ||$curaddress=="" ||$username=="" ||$email=="" || $role=="" ){
				$msg= "<span class='error'>Fields Must Not be Empty!</span>";
				return $msg;
			}elseif($chkEmail==true){
				return "<span class='error'>Email not Available</span>";
			}elseif($chkUsername==true){
				return "<span class='error'>Username not Available</span>";
			}
			elseif($chkId==true){
				return "<span class='error'>ID not Available</span>";
			}else{
				if(!empty($file_name)){
					if($file_size>1048567){
						return "<span class='error'>File's size should be less than 1 MB</span>";
					}
					elseif(in_array($file_ext, $permitted)==false){
						return "<span class='error'>Upload ".implode(", ",$permitted)." Only</span>";
					}
					else{
						$select="SELECT * from tbl_admin where id='$userid'";
		 				$getData=$this->db->select($select);
		 				if($getData){
		 					while($delImg =$getData->fetch_assoc()){
					 			$img=$delImg['img'];
					 			unlink($img);
				 			}
					 	}
						move_uploaded_file($file_tmp, $upload_image);
						$query="UPDATE tbl_admin 
						        SET 
						        name='$name',
		                        username='$username',
		                        email='$email',
		                        phone='$phone',
		                        img='$upload_image',
		                        hometown='$hometown',
		                        curaddress='$curaddress',
		                        role='$role',
		                        pin='$pin'
						        WHERE id='$userid'";
						$updateAdmin =$this->db->update($query);
						if($updateAdmin ){
							return "<span class='success'>Data Updated Successfully.</span>";
						}
						else {
							return "<span class='error'>Data Not Updated !</span>";
						}
					}
				}else{
					$query="UPDATE tbl_admin 
					        SET 
					        name='$name',
	                        username='$username',
	                        email='$email',
	                        phone='$phone',
	                        hometown='$hometown',
	                        curaddress='$curaddress',
	                        role='$role',
	                        pin='$pin'
	                        WHERE id='$userid'";
					$updateAdmin =$this->db->update($query);
					if($updateAdmin ){
						return "<span class='success'>Data Updated Successfully.</span>";
					}
					else {
						return "<span class='error'>Data Not IUpdated !</span>";
					}
				}
			}     
        }
        //admin profile
		public function adminData($userid, $role){
			$quary="SELECT * from tbl_admin where id='$userid' AND role='$role'";
            $admin=$this->db->select($quary);
            return $admin;
		}
		//admin view
		public function adminView($adminid){
			$quary="SELECT * from tbl_admin where id='$adminid'";
            $admin=$this->db->select($quary);
            return $admin;
		}
		public function changePassword($email,$pin, $opassword,$npassword){
			$email =$this->fm->validation($email);
			$email= mysqli_real_escape_string($this->db->link, $email);
			$pin =$this->fm->validation($pin);
			$pin= mysqli_real_escape_string($this->db->link, $pin);
			$opassword =$this->fm->validation($opassword);
			$opassword= mysqli_real_escape_string($this->db->link, $opassword);
			$npassword =$this->fm->validation($npassword);
			$npassword= mysqli_real_escape_string($this->db->link, $npassword);
			 
			if(empty($email) || empty($pin) || empty($opassword) || empty($npassword)){
				$msg="<span class='error'>Fields must not be empty</span>";
				return $msg;
			}else if($opassword == $npassword){
				$msg="<span class='error'>Old and New Password is Same!</span>";
				return $msg;
			}else{
				$opassword=md5($opassword);
				$select="SELECT * from tbl_admin WHERE email='$email' AND pin='$pin' AND password='$opassword'";
				$getUser=$this->db->select($select);
				if($getUser){
					$npassword=md5($npassword);
					$query="UPDATE tbl_admin 
					SET 
					password='$npassword'
					WHERE email='$email' AND pin='$pin' AND password='$opassword'";
					$changePassword=$this->db->update($query);
					if($changePassword){
						$msg="<span class='success'>Password Changed Successfully</span>";
						return $msg;
					}else{
						$msg="<span class='success'>Passwords not Changed!</span>";
						return $msg;
					}
				}else{
						$msg="<span class='error'>Check Email, Pin or Your Old Password</span>";
						return $msg;
				}
				 
			}
		}
		public function addAdmin($data, $file){
			$id=$this->fm->validation($data['id']);
			$name=$this->fm->validation($data['name']);
		    $username=$this->fm->validation($data['username']);
		    $email=$this->fm->validation($data['email']);
            $password=$this->fm->validation($data['password']);
            $phone=$this->fm->validation($data['phone']);
            $hometown=$this->fm->validation($data['hometown']);
            $curaddress=$this->fm->validation($data['curaddress']);
            $role=$this->fm->validation($data['role']);
            $pin=$this->fm->validation($data['pin']);

             
            $id=mysqli_real_escape_string($this->db->link, $id);
            $name=mysqli_real_escape_string($this->db->link, $name);
            $username=mysqli_real_escape_string($this->db->link, $username);
            $password=mysqli_real_escape_string($this->db->link, $password);
            $password=md5($password);
            $email=mysqli_real_escape_string($this->db->link, $email);
            $phone=mysqli_real_escape_string($this->db->link, $phone);
            $hometown =mysqli_real_escape_string($this->db->link, $hometown );
            $curaddress=mysqli_real_escape_string($this->db->link, $curaddress);
            $role=mysqli_real_escape_string($this->db->link, $role);
            $pin=mysqli_real_escape_string($this->db->link, $pin);

            $permitted=array("jpg","png","gif","jpeg");
			$file_name=$file['image']['name']; //foyez.JPG
			$file_size=$file['image']['size'];
			$file_tmp= $file['image']['tmp_name'];

			$div=explode(".", $file_name);
			$file_ext=strtolower(end($div)); //jpg
			$unique_name=substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image="upload/admins/".$unique_name; //uploads/unique_name

			$emailquery="SELECT * from tbl_admin where email='$email'";
			$chkEmail=$this->db->select($emailquery);
			$userQuery="SELECT * from tbl_admin where username='$username'";
			$chkUsername=$this->db->select($userQuery);
			$idQuery="SELECT * from tbl_admin where email='$email' || id='$id'";
			$chkId=$this->db->select($idQuery);

			if($id=="" || $name=="" || $username=="" || $email=="" || $password=="" || $phone=="" || $hometown=="" || $curaddress=="" || $role=="" || $pin==""){
				$msg= "<span class='error'>Please fill all the fields!</span>";
				return $msg;
			}
			elseif($file_size>1048567){
				return "<span class='error'>File's size should be less than 1 MB</span>";
			}elseif(empty($file_name)){
				return "<span class='error'>Please Upload an Image</span>";
			}
			elseif(in_array($file_ext, $permitted)==false){
				return "<span class='error'>Upload ".implode(", ",$permitted)." Only</span>";
			}elseif($chkEmail==true){
				return "<span class='error'>Email is Already Added</span>";
			}elseif($chkUsername==true){
				return "<span class='error'>Username not Available</span>";
			}
			elseif($chkId==true){
				return "<span class='error'>ID is Already Added</span>";
			}
			else{
				move_uploaded_file($file_tmp, $upload_image);
				$query="INSERT into tbl_admin(id,name,username,email,password, phone,  img,hometown,curaddress,role, pin) 
						values('$id', '$name','$username','$email','$password','$phone','$upload_image','$hometown','$curaddress', '$role', $pin)";
				$addStudent=$this->db->insert($query);
				if($addStudent){
					return "<span class='success'>User Added Successfully.</span>";
				}
				else {
					return "<span class='error'>User Not Added!</span>";
				}
			}
		}
		public function allAdmins(){
			$query="SELECT * from tbl_admin order by id ASC";
			$admins=$this->db->select($query);
			return $admins;
		}
		public function delAdmin($deluser) {
			$delquery="DELETE FROM tbl_admin where id='$deluser'";
			$result=$this->db->delete($delquery);
			if($result){
	           return "<span class='success'>User Deleted Successfully</span>";
	           $result=1;
	        }else{
	            return "<span class='error'>User Not Deleted</span>";
	        }
		}
	}
?>