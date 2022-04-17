<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $bus=new Bus();
?> 
<?php
  date_default_timezone_set("Asia/Dhaka");
  $time=date('H:i:s', strtotime('-2 seconds'));
  $date=date("Y/m/d");
  $availUpdate=$bus->updateAvailableBus($time,$date);
?>

 <?php
 	date_default_timezone_set("Asia/Dhaka");
    $time=date("H:i:s");
	if(isset($_GET['busReachid']) && $_GET['busReachid']!=NULL){
		$reachedBusid=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['busReachid']);//filtering
		$reachedBus=$bus->reachedBusInsertById($reachedBusid,$time);	 
	}if(isset($_GET['busCancelid']) && $_GET['busCancelid']!=NULL){
		$cancelBusid=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['busCancelid']);//filtering
		 $cancelBus=$bus->reachedBusInsertById($cancelBusid);	 
	}
?>
<?php
	if(isset($_POST['filter'])){
             echo "<script>window.location='busrecordfilter.php?ftbl=1'</script>";
        }
?>
<!--for Filter Button-->
<style>
    .btn{margin-top: 6px; font-size:16px; font-color: white;}
    .btn:hover{
		background-color: #1acc1a;
	}

</style>
 
<div class="grid_10">
    <div class="box round first grid">
    	 
        <h2>Bus History</h2>
        <form action="" method="post">
            <input class='btn' type="submit" name="filter" Value="Filter Record"/>
        </form>
        <div class="block"> 
        <div> 
          </div> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Bus ID</th>
					<th>Number Plate</th>
					<th>Seats</th>
					<th>Trips Today</th>
					<th>Weekly Trips</th>
					<th>Monthly Trips</th>
					<th>Total Trips</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=0;
					$getBusHistory=$bus->getBusHistory();
					if($getBusHistory){
						while($result=$getBusHistory->fetch_assoc()){	
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['busid'];?></td>
					<td><?php echo $result['nplate'];?></td>
					<td><?php echo $result['seats'];?></td>
					<td>
					<?php 
						$tripsByDate=$bus->tripsByDate($result['busid'],'0');
						if($tripsByDate){
							$tripsCount=$tripsByDate->num_rows;
							echo $tripsCount;
						}else{
							echo "No Trips";
						}
					?>
						
					</td>
					<td> 
					<?php 
						$tripsByDate=$bus->tripsByDate($result['busid'],'7');
						if($tripsByDate){
							$tripsCount=$tripsByDate->num_rows;
							echo $tripsCount;
						}else{
							echo "No Trips";
						}
					?>
					</td>
					<td>
					<?php 
						$tripsByDate=$bus->tripsByDate($result['busid'],'30');
						if($tripsByDate){
							$tripsCount=$tripsByDate->num_rows;
							echo $tripsCount;
						}else{
							echo "No Trips";
						}
					?>
					</td>
					<td><?php 
						$tripsByDate=$bus->tripsByDate($result['busid'],'365');
						if($tripsByDate){
							$tripsCount=$tripsByDate->num_rows;
							echo $tripsCount;
						}else{
							echo "No Trips";
						}
					?></td>
					<td>
						<a class='btn' href="bushistorybyid.php?busid=<?php echo $result['busid'];?>">View</a>
					</td>
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

