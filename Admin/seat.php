
<?php
include "config/config.php";

    include "lib/Database.php";
    $db=new Database();
    
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
	
if($_POST['S2']){
    $seat1 = $_POST['S1'];
    $seat2 = $_POST['S2'];
    $id = $_POST['ID'];
    $frm = $_POST['frm'];
    $route = $_POST['route'];
    $busid = $_POST['busid'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $status = "1";
    $us1query="INSERT into tbl_seat SET route='".$route."', busid='".$busid."', seat='".$seat1."', studentid='".$id."', status ='1', frm='".$frm."'";
    $addseat1=$db->insert($us1query);
    $book="INSERT into tbl_bookinghistory SET busid='".$busid."', seat='".$seat1."', studentid='".$id."', stats ='1', frm='".$frm."',  time='".$time."', date='".$date."'";
    $addseat1=$db->insert($book);
    $us2query="INSERT into tbl_seat SET route='".$route."', busid='".$busid."', seat='".$seat2."', studentid='".$id."', status ='1', frm='".$frm."'";
    $addseat2=$db->insert($us2query);
    $book1="INSERT into tbl_bookinghistory SET busid='".$busid."', seat='".$seat2."', studentid='".$id."', stats ='1', frm='".$frm."',  time='".$time."', date='".$date."'";
    $addseat1=$db->insert($book1);
	$bookedseats="SELECT * from tbl_seat Where busid='$busid'";
    $bookedseats=$db->select($bookedseats);
    $booked='0';
    if($bookedseats){
        while($value=$bookedseats->fetch_assoc()){
            $booked++;
        }
        $Updatequery="UPDATE tbl_bussend
                            SET 
                            bookedseats='$booked'
                            WHERE busid='$busid'";
        $update=$db->update($Updatequery);
    }
    if($addseat1 && $addseat2){
		$response['error'] = false;
		$response['message'] = "Booked Successfully";
    }
    else {
		$response['error'] = true;
		$response['message'] = "Cannot Book Internal error";
	}
}
    else {
	$seat1 = $_POST['S1'];
    $id = $_POST['ID'];
    $frm = $_POST['frm'];
    $route = $_POST['route'];
    $busid = $_POST['busid'];
    $status = "1";
    $us1query="INSERT into tbl_seat SET route='".$route."', busid='".$busid."', seat='".$seat1."', studentid='".$id."', status ='1', frm='".$frm."'";
    $addseat1=$db->insert($us1query);
   
    $book="INSERT into tbl_bookinghistory SET busid='".$busid."', seat='".$seat1."', studentid='".$id."', stats ='1', frm='".$frm."', time='".$time."', date='".$date."'";
    $addseat1=$db->insert($book);
    
	$bookedseats="SELECT * from tbl_seat Where busid='$busid'";
    $bookedseats=$db->select($bookedseats);
    $booked='0';
    if($bookedseats){
        while($value=$bookedseats->fetch_assoc()){
            $booked++;
        }
        $Updatequery="UPDATE tbl_bussend
                            SET 
                            bookedseats='$booked'
                            WHERE busid='$busid'";
        $update=$db->update($Updatequery);
    }
    

    if($addseat1){
		$response['error'] = false;
		$response['message'] = "Booked Successfully";
    }
    else {
		$response['error'] = true;
		$response['message'] = "Cannot Book Internal error";
	}
	}
echo json_encode($response);
        
}
?>
<form class="form" action="" method="post" enctype="multipart/form-data">
    <table>
            <tr>
                <td>route</td>
                <td> <input type="text" name="route" placeholder="route"/> </td>
            </tr>
            <tr>
                <td>busid</td>
                <td> <input type="text" name="busid" placeholder="busid"/> </td>
            </tr>
            <tr>
                <td>Seat a1</td>
                <td><input type="text" name="S1" placeholder="S1"/> </td>
            </tr>
            <tr>
                <td>Seat a2</td>
                <td> <input type="text" name="S2" placeholder="S2"/> </td>
            </tr> 
            <tr>
                <td>Student ID</td>
                <td> <input type="text" name="ID" placeholder="ID"/> </td>
            </tr>
            <tr>
                <td>from</td>
                <td> <input type="text" name="frm" placeholder="frm"/> </td>
            </tr>
            <tr>
                <td>time</td>
                <td> <input type="text" name="time" placeholder="time"/> </td>
            </tr>
            <tr>
                <td>date</td>
                <td> <input type="text" name="date" placeholder="date"/> </td>
            </tr>
            <tr>
                <td></td>
                <td><input class='btn'type="submit" value="submit" /></td>
            </tr>
        </table>
</form>


 
 
