
<?php
	$filepath= realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class Bus{
		private $db;
		private $fm;
		public function __construct(){  //object in constructor can be used within the whole class
			$this->db=new Database();
			$this->fm=new Format();
		}
		public function busAdd($data){
			$busid =$this->fm->validation($data['busid']);
			$busid= mysqli_real_escape_string($this->db->link, $data['busid']); 
	        $nplate=$this->fm->validation($data['nplate']);
	        $nplate= mysqli_real_escape_string($this->db->link, $data['nplate']); 
	        $seats=$this->fm->validation($data['seats']);
	        $seats= mysqli_real_escape_string($this->db->link, $data['seats']); 

			$query="SELECT * from tbl_bus where busid='$busid'";
			$chkExist=$this->db->select($query);

			if($busid=="" || $nplate=="" || $seats==""){
				$msg= "<span class='error'>Please fill all the fields!</span>";
				return $msg;
			}elseif($chkExist==true){
				return "<span class='error'>Bus Already Added</span>";
			}
			else{
				$query="INSERT into tbl_bus(busid,nplate,seats) 
						values('$busid', '$nplate','$seats')";
				$addBus=$this->db->insert($query);
				if($addBus){
					return "<span class='success'>Bus Added Successfully.</span>";
				}
				else {
					return "<span class='error'>Bus Not Added!</span>";
				}
			}
		}
		public function busList(){
			$query="select * from tbl_bus order by busid ASC";
			$getBus=$this->db->select($query);
			return $getBus;
		}
		public function getBusbyId($busid){
			$query="select * from tbl_bus WHERE busid='$busid'";
			$getBus=$this->db->select($query);
			return $getBus;
		}
		public function busUpdate($busid,$nplate,$seats){
			$busid =$this->fm->validation($busid);
			$busid= mysqli_real_escape_string($this->db->link, $busid);
			$nplate =$this->fm->validation($nplate);
			$nplate= mysqli_real_escape_string($this->db->link, $nplate);
			$seats =$this->fm->validation($seats);
			$seats= mysqli_real_escape_string($this->db->link, $seats);

			if($busid=="" || $nplate=="" || $seats==""){
					$msg="<span class='error'>Field must not be empty</span>";
					return $msg;
			}else{
				$query="UPDATE tbl_bus 
				SET 
				busid='$busid',
				nplate='$nplate',
				seats='$seats'

				WHERE busid='$busid'";
				$busEdit=$this->db->update($query);
				if($busEdit){
					$msg="<span class='success'>Bus's Info Updated Successfully</span>";
					return $msg;
				}else{
					$msg="<span class='success'>Bus's Info Can not be Updated</span>";
					return $msg;
				}
			}
		}
		public function delBusbyId($delid){
			$delid= mysqli_real_escape_string($this->db->link, $delid);
			$query="Delete from tbl_bus WHERE busid='$delid'";
			$delBus=$this->db->delete($query);
			if($delBus){
				//return "<span class='success'>Catagory deleted Successfully</span>";
				return $msg="<span class='success'>Bus deleted Successfully</span>";
			}else{
				//return "<span class='error'>Catagory not Deleted</span>";
				return $msg="<span class='error'>Bus not Deleted</span>";
			}
			 
		}
		public function busSend($busid,$nplate,$from,$dest,$route,$seats,$date,$start,$reach){
			$busid =$this->fm->validation($busid);
			$busid= mysqli_real_escape_string($this->db->link, $busid); 
			$nplate =$this->fm->validation($nplate);
			$nplate= mysqli_real_escape_string($this->db->link, $nplate); 
			$from =$this->fm->validation($from);
			$from= mysqli_real_escape_string($this->db->link, $from); 
			$dest =$this->fm->validation($dest);
			$dest= mysqli_real_escape_string($this->db->link, $dest); 
			$route =$this->fm->validation($route);
			$route= mysqli_real_escape_string($this->db->link, $route); 
			$seats =$this->fm->validation($seats);
			$seats= mysqli_real_escape_string($this->db->link, $seats); 
	        $date=$this->fm->validation($date);
	        $date= mysqli_real_escape_string($this->db->link,  $date); 
	        $start=$this->fm->validation($start);
	        $start= mysqli_real_escape_string($this->db->link, $start); 
	        $reach=$this->fm->validation($reach);
	        $reach= mysqli_real_escape_string($this->db->link, $reach); 

			$query="SELECT * from tbl_bussend where busid='$busid' AND status='1' AND datee='$date'";
			$chkExist=$this->db->select($query);
			//to adjust additional seconds by subtracking  1 minutes
			date_default_timezone_set("Asia/Dhaka");
    		$curTime=date('H:i:s', strtotime('-1 minutes'));
    		//$curTime=date('H:i:s', (time() - 60 * 2));
			if($busid=="" || $from=="" || $dest==""|| $route==""||$seats==""|| $dest==""|| $date=="" || $start==""|| $reach==""){
				$msg= "<span class='error'>Please fill all the fields!</span>";
				return $msg;
			}elseif($from == $dest){
				$msg= "<span class='error'>Please Select A Different Destination</span>";
				return $msg;
			}
			elseif($start >= $reach){
				$msg= "<span class='error'>Please Select A Proper Time!</span>";
				return $msg;
			}
			 
    		//elseif($curTime>= $start){
			//	$msg= "<span class='error'>Starting Time is Over!</span>";
			//	return $msg;
			//}
			elseif($chkExist){
				$msg= "<span class='error'>Bus On Road</span>";
				return $msg;
			}
			else{
				//Insert Into tbl_bussend
				$query="INSERT into tbl_bussend(busid,frm,dest,route,seats,datee,start,reach,status) 
						values('$busid', '$from','$dest','$route','$seats','$date','$start','$reach','1')";
				$sendBus=$this->db->insert($query);

				//for store in tbl_busrecord
				$recordQuery="INSERT into tbl_busrecord(busid,nplate,frm,dest,route,seats,datee,start,reach) 
						values('$busid','$nplate', '$from','$dest','$route','$seats','$date','$start','$reach')";
				$busSendRecord=$this->db->insert($recordQuery);

				/*//for store or Insert into tbl_distinctbusrecord
				$select="Select * from tbl_distinctbusrecord where busid=$busid";
				$getBus=$this->db->select($select);
				if($getBus==false){
					$individualQuery="INSERT into tbl_distinctbusrecord(busid,nplate,seats) 
						values('$busid','$nplate','$seats')";
					$individualBusRecord=$this->db->insert($individualQuery);
				}*/
				
				//update tbl_bus
				$busquery="UPDATE tbl_bus 
				SET
				status='1'
				WHERE busid='$busid'";
				$busEdit=$this->db->update($busquery);
				if($sendBus){
					$msg="<span class='success'>Bus Send Successfully.</span>";
					return $msg;
				}
				else {
					return "<span class='error'>Bus Not Send!</span>";
				}
			}
		}
		public function updateAvailableBus($time,$date){
			$time= mysqli_real_escape_string($this->db->link, $time); 
			$date= mysqli_real_escape_string($this->db->link, $date);
			//Available to book before start time
			$curTime=date('H:i:s', strtotime('-1 minutes'));
			$busquery="SELECT * from tbl_bussend where start>='$time'";
			$busquery=$this->db->select($busquery);
			if($busquery){
				while($value=$busquery->fetch_assoc()){
					$busid=$value['busid'];

					//Bus Avail Update
					$updQuery="UPDATE tbl_bussend
					SET 
					avail='1'
					WHERE busid='$busid'";
					$update=$this->db->update($updQuery);
				}
			}
			//Whole Query Depends on the query bellow
			$query="SELECT * from tbl_bussend where reach <='$time'";
			$select=$this->db->select($query);
			if($select){
				while($result=$select->fetch_assoc()){
					$busid=$result['busid'];

					//Bus Available
					$updQuery="UPDATE tbl_bus
					SET 
					status='0'
					WHERE busid='$busid'";
					$update=$this->db->update($updQuery);

					/*//Update tbl_distinctbusrecort
					$distinctQuery="SELECT * from tbl_distinctbusrecord where busid ='$busid'";
					$getCurrentBus=$this->db->select($distinctQuery);
					if($getCurrentBus){
						while($distinctResult=$getCurrentBus->fetch_assoc()){
							$total=$distinctResult['totaltrips']+1;
							$distinctTrips="UPDATE tbl_distinctbusrecord
								SET 
								totaltrips='$total'
								WHERE busid='$busid'";
							$updateDistinctTrips=$this->db->update($distinctTrips);
						}
					}*/
					//Delete Sended Bus
					$delete="Delete from tbl_bussend WHERE busid='$busid'";
					$deleteSendBus=$this->db->delete($delete);

					//Update Trips
					$start=$result['start'];
					$sendedTrips="UPDATE tbl_busrecord
							SET 
							status='1'
							WHERE busid='$busid' AND datee='$date' AND start='$start'";
					$updateTrip=$this->db->update($sendedTrips);
				}
			}
		}
		public function getSendBusbyId($busid){
			$query="select * from tbl_bussend WHERE busid='$busid'";
			$getBus=$this->db->select($query);
			return $getBus;
		}
		public function getBusOnRoad(){
			$query="select * from tbl_bussend where status='1' Order By start ASC";
			$getBus=$this->db->select($query);
			return $getBus;
		}
		public function reachedBusUpdateById($reachedBusid,$time){
			$reachedBusid= mysqli_real_escape_string($this->db->link, $reachedBusid);
			$time= mysqli_real_escape_string($this->db->link, $time);
			//Bus Available (tbl_bus)
			$query="UPDATE tbl_bus
			SET 
			status='0'
			WHERE busid='$reachedBusid'";
			$Update=$this->db->update($query);
			//Update Trips tbl_busrecord
			$querychk="SELECT * from tbl_bussend where busid='$reachedBusid'";
			$select=$this->db->select($querychk);
			if($select){
				while($result=$select->fetch_assoc()){
					$date=$result['datee'];
					$reach=$result['reach'];
					$start=$result['start'];
					$update="UPDATE tbl_busrecord
					SET 
					status='1',
					reach='$time'
					WHERE busid='$reachedBusid' AND datee='$date'AND start='$start' AND reach='$reach'";
		        	$updateTrip=$this->db->update($update);
				}
			}
			//Update tbl_distinctbusrecort
			/*$distinctQuery="SELECT * from tbl_distinctbusrecord where busid ='$busid'";
			$getCurrentBus=$this->db->select($distinctQuery);
			if($getCurrentBus){
				while($distinctResult=$getCurrentBus->fetch_assoc()){
					$total=$distinctResult['totaltrips']+1;
					$distinctTrips="UPDATE tbl_distinctbusrecord
						SET 
						totaltrips='$total'
						WHERE busid='$busid'";
					$updateDistinctTrips=$this->db->update($distinctTrips);
				}
			}*/
			//Delete Sended Bus tbl_bussend
			$delete="Delete from tbl_bussend WHERE busid='$reachedBusid'";
			$deleteSendedBus=$this->db->delete($delete);
			if($deleteSendedBus){
					$msg="<span class='success'>Updated</span>";
					return $msg;
			}
			else {
			    $msg="<span class='error'>Can't Update</span>";
				return $msg;
			}
		}
		public function getBusHistory(){
			$query="SELECT * from tbl_busrecord group by busid";
			$getBus=$this->db->select($query);
			return $getBus;
		}
		public function getIndividualBusRecord($busid){
			$query="SELECT * from tbl_busrecord Where busid='$busid' AND (status='1' || status='2')";
			$getBus=$this->db->select($query);
			return $getBus;
		}
		public function tripsByDate($id,$i){
			$query="SELECT * FROM tbl_busrecord WHERE datee >= DATE(NOW()) - INTERVAL '$i' DAY AND busid='$id' AND status='1';";
			$getRecordByDate=$this->db->select($query);
			return $getRecordByDate;
		}
		public function getAllId(){
			$query="SELECT * from tbl_bus ";
			$getBus=$this->db->select($query);
			return $getBus;
		}
		public function busRecordFilter($data){
			$busid=$this->fm->validation($data['busid']);
	        $busid= mysqli_real_escape_string($this->db->link, $data['busid']); 
			$from=$this->fm->validation($data['from']);
	        $from= mysqli_real_escape_string($this->db->link, $data['from']); 
	        $dest=$this->fm->validation($data['dest']);
	        $dest= mysqli_real_escape_string($this->db->link, $data['dest']); 
	        $route=$this->fm->validation($data['route']);
	        $route= mysqli_real_escape_string($this->db->link, $data['route']); 
	        $date=$this->fm->validation($data['date']);
	        $date= mysqli_real_escape_string($this->db->link, $data['date']); 
	        $t1=$this->fm->validation($data['t1']);
	        $t1= mysqli_real_escape_string($this->db->link, $data['route']); 
	        $t2=$this->fm->validation($data['t2']);
	        $t2= mysqli_real_escape_string($this->db->link, $data['t2']); 
	         
			$query = "SELECT * FROM tbl_busrecord";
		    $conditions = array();
		    if(! empty($busid)) {
		      $conditions[] = "busid='$busid'";
		    }
		    if(! empty($from)) {
		      $conditions[] = "frm='$from'";
		    }
		    if(! empty($dest)) {
		      $conditions[] = "dest='$dest'";
		    }
		    if(! empty($route)) {
		      $conditions[] = "route='$route'";
		    }
		    if(! empty($date)) {
		      $conditions[] = "datee='$date'";
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
		public function busAllRecord(){
			$query="SELECT * from tbl_busrecord ORDER BY busid ASC";
			$getBus=$this->db->select($query);
			return $getBus;
		}
		public function deleteBusRecordById($busid, $date, $route, $start, $reach){
			$busid=$this->fm->validation($busid);
	        $busid= mysqli_real_escape_string($this->db->link, $busid); 
			$date=$this->fm->validation($date);
	        $date= mysqli_real_escape_string($this->db->link, $date); 
	        $route=$this->fm->validation($route);
	        $route= mysqli_real_escape_string($this->db->link, $route); 
			$start=$this->fm->validation($start);
	        $start= mysqli_real_escape_string($this->db->link, $start); 
	        $reach=$this->fm->validation($reach);
	        $reach= mysqli_real_escape_string($this->db->link, $reach); 
			$query="DELETE from tbl_busrecord WHERE busid='$busid' AND datee='$date' AND route='$route' AND start='$start' AND reach='$reach'";
			$deleteBus=$this->db->delete($query);
			if($deleteBus){
				$msg="<span class='success'>Record Deleted Successfully</span>";
				return $msg;
			}
			else {
			    $msg="<span class='error'>Record Not Deleted!</span>";
				return $msg;
			}
		}
		public function cancelBusTripById($busid, $date, $start, $reach){
			$busid=$this->fm->validation($busid);
	        $busid= mysqli_real_escape_string($this->db->link, $busid); 
			$date=$this->fm->validation($date);
	        $date= mysqli_real_escape_string($this->db->link, $date);
			$start=$this->fm->validation($start);
	        $start= mysqli_real_escape_string($this->db->link, $start); 
	        $reach=$this->fm->validation($reach);
	        $reach= mysqli_real_escape_string($this->db->link, $reach); 
	        //Update tbl_bus status as 0
	        $updateTblBus="UPDATE tbl_bus 
	        		 SET
	        		 status='0'
	        		 WHERE busid='$busid'";
	        $updateTblBus=$this->db->update($updateTblBus);
	        //Update tbl_busrecord status=2; means trip canceled
	        $updateTblBusrecord="UPDATE tbl_busrecord 
	        		 SET
	        		 status='2'
	        		 WHERE busid='$busid' AND datee='$date' AND start='$start' AND reach='$reach'";
	        $updateBusrec=$this->db->update($updateTblBusrecord);
	        //Delete from tbl_bussend
			$delete="DELETE from tbl_bussend WHERE busid='$busid' AND datee='$date' AND start='$start' AND reach='$reach'";
			$cancelTrip=$this->db->delete($delete);
			if($cancelTrip){
				$msg="<span class='success'>Trip Canceled Successfully</span>";
				return $msg;
			}
			else {
			    $msg="<span class='error'>Trip Not Canceled!</span>";
				return $msg;
			}
		}
		public function updateBusOnRoad($data){
			$busid=$this->fm->validation($data['busid']);
	        $busid= mysqli_real_escape_string($this->db->link, $data['busid']); 
			$date=$this->fm->validation($data['date']);
	        $date= mysqli_real_escape_string($this->db->link, $data['date']);
	        $from=$this->fm->validation($data['from']);
	        $from= mysqli_real_escape_string($this->db->link, $data['from']); 
			$dest=$this->fm->validation($data['dest']);
	        $dest= mysqli_real_escape_string($this->db->link, $data['dest']);
	        $route=$this->fm->validation($data['route']);
	        $route= mysqli_real_escape_string($this->db->link, $data['route']); 
			$start=$this->fm->validation($data['start']);
	        $start= mysqli_real_escape_string($this->db->link,$data['start']); 
	        $reach=$this->fm->validation($data['reach']);
	        $reach= mysqli_real_escape_string($this->db->link, $data['reach']); 
	        $query="SELECT * from tbl_bussend where busid='$busid'";
	        $getPrevStart=$this->db->select($query);
	        if($getPrevStart){
	        	while($result=$getPrevStart->fetch_assoc()){
	        		$prevStart=$result['start'];
	       		}
	   		}
	        if($busid=="" || $from=="" || $dest==""|| $route=="" || $date=="" || $start==""|| $reach==""){
				$msg= "<span class='error'>Please fill all the fields!</span>";
				return $msg;
			}
	        elseif($from == $dest){
				$msg= "<span class='error'>Please Select A Different Destination</span>";
				return $msg;
			}
			elseif($start >= $reach){
				$msg= "<span class='error'>BUS! Not A Time Travel Machine.</span>";
				return $msg;
			}
			 
    		elseif($start<$prevStart){
				$msg= "<span class='error'>Sorry! Starting Time Can't Be Selected.</span>";
				return $msg;
			}
	        //Update tbl_busrecord 
	        $updateTblBusrecord="UPDATE tbl_busrecord 
	        		SET
	        		frm='$from',
	        		dest='$dest',
	        		route='$route',
	        		start='$start',
	        		reach='$reach'
	        		WHERE busid='$busid' && datee='$date' && status='0'";
	        $updateBusrec=$this->db->update($updateTblBusrecord);
	        //Update tbl_bussend  
	        $updateTblBussend="UPDATE tbl_bussend 
	        		 SET
	        		 frm='$from',
	        		 dest='$dest',
	        		 route='$route',
	        		 start='$start',
	        		 reach='$reach'
	        		 WHERE busid='$busid' && datee='$date' && status='1'";
	        $updateTblBussend=$this->db->update($updateTblBussend);
			if($updateTblBussend){
				$msg="<span class='success'>Trip Record Updated.</span>";
				return $msg;
			}
			else {
			    $msg="<span class='error'>Trip Record Not Updated!</span>";
				return $msg;
			}
		}
		public function checkOnRoadBus($busid){
			$query="SELECT * from tbl_bussend WHERE busid='$busid'";
			$getBus=$this->db->select($query);
			return $getBus;
		}


	}
?>
