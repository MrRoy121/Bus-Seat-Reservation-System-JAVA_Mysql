<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $bus=new Bus();
    $userid=Session::get('id');
    $role=Session::get('role');
?>
<?php
	//to check bus reach time to auto update 
	date_default_timezone_set("Asia/Dhaka");
    $time=date("H:i:s");
    $date=date("Y/m/d");
    $availUpdate=$bus->updateAvailableBus($time,$date);
?>
 <?php
 	date_default_timezone_set("Asia/Dhaka");
    $time=date("H:i:s");
	if(isset($_GET['busReachid']) && $_GET['busReachid']!=NULL){
		$reachedBusid=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['busReachid']);//filtering
		$reachedBus=$bus->reachedBusUpdateById($reachedBusid,$time);	 
	}if(isset($_GET['cancelid']) && $_GET['cancelid']!=NULL && isset($_GET['date']) && $_GET['date']!=NULL && isset($_GET['start']) && $_GET['start']!=NULL && isset($_GET['reach']) && $_GET['reach']!=NULL){
    //filtering
	    $busid=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['cancelid']); 
	    $date=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['date']);
	    $start=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['start']);
	    $reach=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['reach']);
	    $cancelTrip=$bus->cancelBusTripById($busid, $date, $start, $reach);  
    }
?>
<style>
   .btn:hover{
        background-color: #1acc1a;
    }
    span .btn:hover{
        background-color: #ff462e;
    }
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Bus On Road</h2>
                <div class="block"> 
                <div> 
                <?php
                	/*if(isset($reachedBus)){
                		echo $reachedBus;
                	}*/
                	if(isset($cancelBus)){
                		echo $cancelBus;
                	}
                ?>  </div> 
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL</th>
							<th>Bus ID</th>
							<th>From</th>
							<th>Destination</th>
							<th>Route</th>
							<th>Start</th>
							<th>Reached</th>
							<th>Seats</th>
							<th>Booked</th>
							<th width='26%'>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$i=0;
							$getBusOnRoad=$bus->getBusOnRoad();
							if($getBusOnRoad){
								while($result=$getBusOnRoad->fetch_assoc()){	
									$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['busid'];?></td>
							<td><?php echo $result['frm'];?></td>
							<td><?php echo $result['dest'];?></td>
							<td><?php echo $result['route'];?></td>
							<td><?php echo $result['start'];?></td>
							<td><?php echo $result['reach'];?></td>
							<td><?php echo $result['seats'];?></td>
							<td><?php echo $result['bookedseats'];?></td>
						<?php
                            if($role=='BusAdmin' || $userid=='1001'){?>
							<td>
								<a class='btn' href="busview.php?busid=<?php echo $result['busid'];?>">Update</a>
								<a class='btn' onclick="return confirm('Are you SureThe Bus Has Reached The Destination?')" href="?busReachid=<?php echo $result['busid'];?>">Reached</a>
								<span><a class='btn' onclick="return confirm('Are you to Cancel The Trip?')" href="?cancelid=<?php echo $result['busid'];?>&&date=<?php echo $result['datee'];?>&&start=<?php echo $result['start'];?>&&reach=<?php echo $result['reach'];?>">Cancel Trip</a></span>
							</td>
						<?php }else{ ?>
						   <td style="text-align:center;">
						       <a class='btn' style="background-color: #ef4545">Resticted</a>
						   </td>
						<?php }?>
						</tr>
					<?php } }else{
						echo "<span class='error'><span>";
					}?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

