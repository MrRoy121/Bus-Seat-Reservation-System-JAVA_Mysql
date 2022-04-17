
<?php
	$filepath= realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class Student{
		private $db;
		private $fm;
		public function __construct(){  //object in constructor can be used within the whole class
			$this->db=new Database();
			$this->fm=new Format();
		}
		public function studentRegistration($data, $file){
			$studentName =$this->fm->validation($data['studentName']);
			$studentName= mysqli_real_escape_string($this->db->link, $data['studentName']); 
	        $studentid=$this->fm->validation($data['studentid']);
	        $studentid= mysqli_real_escape_string($this->db->link, $data['studentid']);
	        $dept=$this->fm->validation($data['dept']);
	        $dept= mysqli_real_escape_string($this->db->link, $data['dept']);
	        $email=$this->fm->validation($data['email']);
	        $email= mysqli_real_escape_string($this->db->link, $data['email']); 
	        $password=$this->fm->validation($data['password']);
	        $password= mysqli_real_escape_string($this->db->link, $data['password']); 
	        $phone=$this->fm->validation($data['phone']);
	        $phone= mysqli_real_escape_string($this->db->link, $data['phone']); 
	        $dob=$this->fm->validation($data['dob']);
	        $dob= mysqli_real_escape_string($this->db->link, $data['dob']); 
	        $semester=$this->fm->validation($data['semester']);
	        $semester= mysqli_real_escape_string($this->db->link, $data['semester']); 
	        $section=$this->fm->validation($data['section']);
	        $section= mysqli_real_escape_string($this->db->link, $data['section']); 
	        $route=$this->fm->validation($data['route']);
	        $route= mysqli_real_escape_string($this->db->link, $data['route']); 
	        $pup= $data['pick'];
	         	        

	        //$permitted=array("jpg","png","gif","jpeg");
			//$file_name=$file['img']['name']; //foyez.JPG
			//$file_size=$file['img']['size'];
			//$file_tmp= $file['img']['tmp_name'];

			$div=explode(".", $file_name);
			$file_ext=strtolower(end($div)); //jpg
			$unique_name=substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image="upload/registeredStudents/".$unique_name; //uploads/unique_name

			$query="SELECT * from tbl_allstudents where studentName='$studentName' && id='$studentid'";
			$valid=$this->db->select($query);

			$query="SELECT * from tbl_student where studentid='$studentid'";
			$existStudent=$this->db->select($query);
			
			if($studentName=="" || $studentid=="" || $dept=="" || $email=="" || $password=="" || $phone=="" || $dob=="" || $semester=="" || $section=="" || $route=="" || $pup=="" ){
				$msg= "<span class='error'>Please fill all the fields!</span>";
				return $msg;
			}
			elseif($file_size>1048567){
				return "<span class='error'>File's size should be less than 1 MB</span>";
			}
			elseif(in_array($file_ext, $permitted)==false){
				return "<span class='error'>Upload ".implode(", ",$permitted)." Only</span>";
			}elseif($valid==false){
				return "<span class='error'>You Are Not a Valid Student</span>";
			}elseif($existStudent==true){
				return "<span class='error'>You Are already Registered</span>";
			}
			else{
				move_uploaded_file($file_tmp, 'admin/'.$upload_image);
				$query="INSERT into tbl_student(studentName, studentid,dept,email, password, phone, dob,semester,section, img,prefered_route,pick_up_point) 
						values('$studentName', '$studentid','$dept','$email','$password','$phone','$dob','$semester','$section','$upload_image','$route','$pup')";
				$register=$this->db->insert($query);
				if($register){
					return "<span class='success'>Registration Successfully.</span>";
				}
				else {
					return "<span class='error'>Error! Registration Failed.</span>";
				}
			}
		}
		public function studentAdd($data, $file){
			$studentid=$this->fm->validation($data['studentid']);
	        $studentid= mysqli_real_escape_string($this->db->link, $data['studentid']); 
			$studentName =$this->fm->validation($data['studentName']);
			$studentName= mysqli_real_escape_string($this->db->link, $data['studentName']); 
	        $dept=$this->fm->validation($data['dept']);
	        $dept= mysqli_real_escape_string($this->db->link, $data['dept']);
	        trim($dept);
	        $email=$this->fm->validation($data['email']);
	        $email= mysqli_real_escape_string($this->db->link, $data['email']);  
	        $phone=$this->fm->validation($data['phone']);
	        $phone= mysqli_real_escape_string($this->db->link, $data['phone']); 
	        $dob=$this->fm->validation($data['dob']);
	        $dob= mysqli_real_escape_string($this->db->link, $data['dob']); 
	        $semester=$this->fm->validation($data['semester']);
	        $semester= mysqli_real_escape_string($this->db->link, $data['semester']); 
	        $section=$this->fm->validation($data['section']);
	        $section= mysqli_real_escape_string($this->db->link, $data['section']); 
	        $hometown=$this->fm->validation($data['hometown']);
	        $hometown= mysqli_real_escape_string($this->db->link, $data['hometown']); 
	        $curaddress=$this->fm->validation($data['curaddress']);
	        $curaddress= mysqli_real_escape_string($this->db->link, $data['curaddress']); 
	        

	        $permitted=array("jpg","png","gif","jpeg");
			$file_name=$file['image']['name']; //foyez.JPG
			$file_size=$file['image']['size'];
			$file_tmp= $file['image']['tmp_name'];

			$div=explode(".", $file_name);
			$file_ext=strtolower(end($div)); //jpg
			$unique_name=substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image="upload/allStudents/".$unique_name; //uploads/unique_name

			$query="SELECT * from tbl_allstudents where id='$studentid'";
			$chkExist=$this->db->select($query);

			if($studentid=="" || $studentName=="" || $email=="" || $phone=="" || $dob=="" || $semester=="" || $section=="" || $hometown=="" || $curaddress=="" ){
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
			}elseif($chkExist==true){
				return "<span class='error'>Student Already Added</span>";
			}
			else{
				move_uploaded_file($file_tmp, $upload_image);
				$query="INSERT into tbl_allstudents(id,studentName,dept,email, phone, dob,semester,section,img,hometown,current_address) 
						values('$studentid', '$studentName','$dept','$email','$phone','$dob','$semester','$section','$upload_image','$hometown','$curaddress')";
				$addStudent=$this->db->insert($query);
				if($addStudent){
					return "<span class='success'>Student Added Successfully.</span>";
				}
				else {
					return "<span class='error'>Student Not Added!</span>";
				}
			}
		}
		public function studentList(){
			$query="select * from tbl_allstudents ORDER BY id ASC";
			$result=$this->db->select($query);
			return $result;
		}

		public function allStudentListFilter($data){
			$name=$this->fm->validation($data['name']);
	        $name= mysqli_real_escape_string($this->db->link, $data['name']); 
			$id=$this->fm->validation($data['id']);
	        $id= mysqli_real_escape_string($this->db->link, $data['id']);
			$dept=$this->fm->validation($data['dept']);
	        $dept= mysqli_real_escape_string($this->db->link, $data['dept']); 
			$semester=$this->fm->validation($data['semester']);
	        $semester= mysqli_real_escape_string($this->db->link, $data['semester']); 
	        $section=$this->fm->validation($data['section']);
	        $section= mysqli_real_escape_string($this->db->link, $data['section']); 
	        $hometown=$this->fm->validation($data['hometown']);
	        $hometown= mysqli_real_escape_string($this->db->link, $data['hometown']); 
	        $cur_add=$this->fm->validation($data['cur_add']);
	        $cur_add= mysqli_real_escape_string($this->db->link, $data['cur_add']); 
	        
			$query = "SELECT * FROM tbl_allstudents";
		    $conditions = array();
		    if(! empty($name)) {
		      $conditions[] = "studentName LIKE '%$name%'";
		    }
		    if(! empty($id)) {
		      $conditions[] = "id='$id'";
		    }
		    if(! empty($dept)) {
		      $conditions[] = "dept='$dept'";
		    }
		    if(! empty($semester)) {
		      $conditions[] = "semester='$semester'";
		    }
		    if(! empty($section)) {
		      $conditions[] = "section='$section'";
		    }
		    if(! empty($hometown)) {
		      $conditions[] = "hometown LIKE '%$hometown%'";
		    }
		    if(! empty($cur_add)) {
		      $conditions[] = "current_address LIKE '%$cur_add%'";
		    }

		    $sql = $query;
		    if (count($conditions) > 0) {
		      $sql .= " WHERE " . implode(' AND ', $conditions);
		    }else{
		    	return '5';
		    }

		    $result=$this->db->select($sql);
		    return $result;
		}
		public function getRegStudentById($editid){
			$query="select * from tbl_student WHERE studentid='$editid'";
			$getStudent=$this->db->select($query);
			return $getStudent;
		}
		public function studentEditReg($data, $file, $editid){
			$studentid =$this->fm->validation($data['studentid']);
			$studentid = mysqli_real_escape_string($this->db->link, $data['studentid']); 
	        $name =$this->fm->validation($data['name']);
	        $name= mysqli_real_escape_string($this->db->link, $data['name']); 
	        $dept =$this->fm->validation($data['dept']);
	        $dept = mysqli_real_escape_string($this->db->link, $data['dept']); 
	        $email =$this->fm->validation($data['email']);
	        $email = mysqli_real_escape_string($this->db->link, $data['email']); 
	        $password =$this->fm->validation($data['password']);
	        $password = mysqli_real_escape_string($this->db->link, $data['password']); 
	        $phone =$this->fm->validation($data['phone']);
	        $phone = mysqli_real_escape_string($this->db->link, $data['phone']); 
	        $dob =$this->fm->validation($data['dob']);
	        $dob = mysqli_real_escape_string($this->db->link, $data['dob']); 

	        $semester =$this->fm->validation($data['semester']);
	        $semester = mysqli_real_escape_string($this->db->link, $data['semester']); 
	        $section =$this->fm->validation($data['section']);
	        $section = mysqli_real_escape_string($this->db->link, $data['section']); 
	        $route =$this->fm->validation($data['route']);
	        $route = mysqli_real_escape_string($this->db->link, $data['route']); 
	        $pick =$this->fm->validation($data['pick']);
	        $pick = mysqli_real_escape_string($this->db->link, $data['pick']); 

	        $permitted=array("jpg","png","gif","jpeg");
			$file_name=$file['image']['name']; //foyez.JPG
			$file_size=$file['image']['size'];
			$file_tmp= $file['image']['tmp_name'];

			$div=explode(".", $file_name);
			$file_ext=strtolower(end($div)); //jpg
			$unique_name=substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image="upload/registeredStudents/".$unique_name; //uploads/unique_name
			
			if($studentid=="" || $name=="" ||$dept=="" || $email=="" || $password=="" || $phone=="" || $dob=="" || $semester=="" || $section=="" || $route=="" ||  $pick==""){
				$msg= "<span class='error'>Please fill all the fields!</span>";
				return $msg;
				
			}else{
				if(!empty($file_name)){
					if($file_size>1048567){
						return "<span class='error'>File's size should be less than 1 MB</span>";
					}
					elseif(in_array($file_ext, $permitted)==false){
						return "<span class='error'>Upload ".implode(", ",$permitted)." Only</span>";
					}
					else{
						$select="SELECT * from tbl_student where studentid='$studentid'";
		 				$getData=$this->db->select($select);
		 				if($getData){
		 					while($delImg =$getData->fetch_assoc()){
					 			$img=$delImg['img'];
					 			unlink($img);
				 			}
					 	}
						move_uploaded_file($file_tmp, $upload_image);
						$query="UPDATE tbl_student 
						        SET 
						        studentName='$name',
						        studentid='$studentid',
						        dept='$dept ',
						        email='$email',
						        password='$password',
						        phone='$phone',
						        dob='$dob',
						        semester='$semester',
						        section='$section',
						        img='$upload_image',
						        prefered_route='$route',
						        pick_up_point='$pick'
						        Where studentid='$studentid'";
						$updateStudent =$this->db->update($query);
						if($updateStudent ){
							return "<span class='success'>Data Updated Successfully.</span>";
						}
						else {
							return "<span class='error'>Data Not IUpdated !</span>";
						}
					}
				}else{
					$query="UPDATE tbl_student 
					        SET 
					        studentName='$name',
					        studentid='$studentid',
					        dept='$dept ',
					        email='$email',
					        password='$password',
					        phone='$phone',
					        dob='$dob',
					        semester='$semester',
					        section='$section',
					        prefered_route='$route',
					        pick_up_point='$pick'
					        WHERE studentid='$studentid'";
					$updateStudent =$this->db->update($query);
					if($updateStudent ){
						return "<span class='success'>Data Updated Successfully.</span>";
					}
					else {
						return "<span class='error'>Data Not IUpdated !</span>";
					}
				}
			}
		}
		public function getAllStudentById($editid){
			$query="select * from tbl_allstudents WHERE id='$editid'";
			$getStudent=$this->db->select($query);
			return $getStudent;
		}
		public function studentEditAll($data, $file, $editid){
			$studentid =$this->fm->validation($data['studentid']);
			$studentid = mysqli_real_escape_string($this->db->link, $data['studentid']); 
	        $name =$this->fm->validation($data['name']);
	        $name= mysqli_real_escape_string($this->db->link, $data['name']); 
	        $dept =$this->fm->validation($data['dept']);
	        $dept = mysqli_real_escape_string($this->db->link, $data['dept']); 
	        $email =$this->fm->validation($data['email']);
	        $email = mysqli_real_escape_string($this->db->link, $data['email']); 
	        $phone =$this->fm->validation($data['phone']);
	        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
	        $dob =$this->fm->validation($data['dob']);
	        $dob = mysqli_real_escape_string($this->db->link, $data['dob']); 

	        $semester =$this->fm->validation($data['semester']);
	        $semester = mysqli_real_escape_string($this->db->link, $data['semester']); 
	        $section =$this->fm->validation($data['section']);
	        $section = mysqli_real_escape_string($this->db->link, $data['section']); 
	        $hometown =$this->fm->validation($data['hometown']);
	        $hometown = mysqli_real_escape_string($this->db->link, $data['hometown']); 
	        $curaddress =$this->fm->validation($data['curaddress']);
	        $curaddress = mysqli_real_escape_string($this->db->link, $data['curaddress']); 

	        $permitted=array("jpg","png","gif","jpeg");
			$file_name=$file['image']['name']; //foyez.JPG
			$file_size=$file['image']['size'];
			$file_tmp= $file['image']['tmp_name'];

			$div=explode(".", $file_name);
			$file_ext=strtolower(end($div)); //jpg
			$unique_name=substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image="upload/allStudents/".$unique_name; //uploads/unique_name
			
			if($studentid=="" || $name=="" ||$dept=="" || $email=="" || $phone=="" || $dob=="" || $semester=="" || $section=="" || $hometown=="" ||  $curaddress==""){
				$msg= "<span class='error'>Please fill all the fields!</span>";
				return $msg;
				
			}else{
				if(!empty($file_name)){
					if($file_size>1048567){
						return "<span class='error'>File's size should be less than 1 MB</span>";
					}
					elseif(in_array($file_ext, $permitted)==false){
						return "<span class='error'>Upload ".implode(", ",$permitted)." Only</span>";
					}
					else{
						$select="SELECT * from tbl_allstudents where id='$studentid'";
		 				$getData=$this->db->select($select);
		 				if($getData){
		 					while($delImg =$getData->fetch_assoc()){
					 			$img=$delImg['img'];
					 			unlink($img);
				 			}
					 	}
						move_uploaded_file($file_tmp, $upload_image);
						$query="UPDATE tbl_allstudents 
						        SET 
						        id='$studentid',
						        studentName='$name',
						        dept='$dept ',
						        email='$email',
						        phone='$phone',
						        dob='$dob',
						        semester='$semester',
						        section='$section',
						        img='$upload_image',
						        hometown='$hometown',
						        current_address='$curaddress'
						        Where id='$studentid'";
						$updateStudent =$this->db->update($query);
						if($updateStudent ){
							return "<span class='success'>Data Updated Successfully.</span>";
						}
						else {
							return "<span class='error'>Data Not IUpdated !</span>";
						}
					}
				}else{
					$query="UPDATE tbl_allstudents 
					        SET 
					        id='$studentid',
					        studentName='$name',
					        dept='$dept ',
					        email='$email',
					        phone='$phone',
					        dob='$dob',
					        semester='$semester',
					        section='$section',
					        hometown='$hometown',
					        current_address='$curaddress'
					        WHERE id='$studentid'";
					$updateStudent =$this->db->update($query);
					if($updateStudent ){
						return "<span class='success'>Data Updated Successfully.</span>";
					}
					else {
						return "<span class='error'>Data Not IUpdated !</span>";
					}
				}
			}
		}
		public function registeredStudentList(){
			$query="select * from tbl_student ORDER BY studentid ASC";
			$result=$this->db->select($query);
			return $result;
		}
		public function regStudentListFilter($data){
			$name=$this->fm->validation($data['name']);
	        $name= mysqli_real_escape_string($this->db->link, $data['name']); 
			$id=$this->fm->validation($data['id']);
	        $id= mysqli_real_escape_string($this->db->link, $data['id']); 
			$dept=$this->fm->validation($data['dept']);
	        $dept= mysqli_real_escape_string($this->db->link, $data['dept']); 
			$semester=$this->fm->validation($data['semester']);
	        $semester= mysqli_real_escape_string($this->db->link, $data['semester']); 
	        $section=$this->fm->validation($data['section']);
	        $section= mysqli_real_escape_string($this->db->link, $data['section']); 
	        $route=$this->fm->validation($data['route']);
	        $route= mysqli_real_escape_string($this->db->link, $data['route']);
	        $pup= $data['pick'];
	    
			$query = "SELECT * FROM tbl_student";
		    $conditions = array();
		    if(! empty($name)) {
		      $conditions[] = " studentName LIKE '%$name%'";
		    }
		    if(! empty($id)) {
		      $conditions[] = "studentid='$id'";
		    }
		    if(! empty($dept)) {
		      $conditions[] = "dept='$dept'";
		    }
		    if(! empty($semester)) {
		      $conditions[] = "semester='$semester'";
		    }
		    if(! empty($section)) {
		      $conditions[] = "section='$section'";
		    }
		    if(! empty($route)) {
		      $conditions[] = "prefered_route='$route'";
		    }
		    if(! empty($pup)) {
		      $conditions[] = "pick_up_point='$pup'";
		    }

		    $sql = $query;
		    if (count($conditions) > 0) {
		      $sql .= " WHERE " . implode(' AND ', $conditions);
		    }else{
		    	return '5';  //empty check
		    }

		    $result=$this->db->select($sql);
		    return $result;
		}
		public function delRegStuById($delid){
			$delid=$this->fm->validation($delid);
	        $delid= mysqli_real_escape_string($this->db->link, $delid); 
		 	$select="SELECT * from tbl_student where studentid='$delid'";
		 	$getData=$this->db->select($select);
		 	if($getData){
		 		while($delImg =$getData->fetch_assoc()){
		 			$img=$delImg['img'];
		 			unlink($img);
		 		}
		 	}
			$query="DELETE from tbl_student WHERE studentid='$delid'";
			$deleteStudent=$this->db->delete($query);
			if($deleteStudent){
				$msg="<span class='success'>Registered Student Deleted Successfully</span>";
				return $msg;
			}
			else {
			    $msg="<span class='error'>Can Not Delete Data!</span>";
				return $msg;
			}
		} 
		public function delFromAllStuById($delid){
			$delid=$this->fm->validation($delid);
	        $delid= mysqli_real_escape_string($this->db->link, $delid); 
			$select="SELECT * from tbl_allstudents where id='$delid'";
		 	$getData=$this->db->select($select);
		 	if($getData){
		 		while($delImg =$getData->fetch_assoc()){
		 			$img=$delImg['img'];
		 			unlink($img);
		 		}
		 	}
			$query="DELETE from tbl_allstudents WHERE id='$delid'";
			$deleteStudent=$this->db->delete($query);
			if($deleteStudent){
				$msg="<span class='success'>Student Deleted Successfully</span>";
				return $msg;
			}
			else {
			    $msg="<span class='error'>Can Not Delete Data!</span>";
				return $msg;
			}
		}
	}
?>
