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
	if(!isset($_GET['ftbl']) || $_GET['ftbl']==NULL){
        //to not show filter tbl without pressing filter button
        echo "<script>window.location='bushistory.php'</script>";
    }else{
        $ftbl= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['ftbl']);
    }
?>
<?php
    $list; $alltable;
    //if(isset($_POST['submit'])){}
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['filter'])){
        	 
            $filterBusRecord=$bus->busRecordFilter($_POST);
            if($filterBusRecord=='5'){
                $list='0';//$list=0 =Filter Is Empty
            }else{
                $list='1';//$list=1= Data Found
            }
        }elseif(isset($_POST['all'])){
        	 
            $busAllRecord=$bus->busAllRecord();
            if($busAllRecord){
                $alltable='1';
              
            }else{
                $alltable='0';
            }
        }
    }
?>
<style>          
   .scs{color: green;}
   .rd{color: red;}
</style>
<div class="grid_10">
<div class="box round first grid">
<h2>Bus Record</h2>
<div class="block"> 
     
    <form action="" method="post" enctype="multipart/form-data">
<?php
    if((!isset($list) && !isset($alltable)) || (isset($list) && $list=="0" )){
?>           
        <div class="block copyblock">
        <!--When Fields are empty $list=0-->
        <?php 
            if(isset($list) && $list=='0'){
                echo "<span class='error'>Can not filter Data!</span>";
            }
        ?>  
        <table class="form">   
            <tr>
                <td>
                    <label>Bus ID</label>
                </td>
                <td>
                <select id="select" name="busid">
                    <option value="">Bus ID</option>
                    <?php 
                    	$getId=$bus->getAllId();
                    	if($getId){
                    		While($result=$getId->fetch_assoc()){ ?>
                    	 <option value="<?php echo $result['busid']?>"><?php echo $result['busid']?></option>

                    <?php } } ?>
                </select>
                </td>
            </tr> 
           <tr>                
    	        <td>
    	          <label>From</label>
    	       </td>
    	       <td>
    	         <select id="select" name="from">
    	           <option value="">Start From</option>
    	           <option value="Tilaghor">Tilaghor</option>
    	           <option value="Kamal Bazar">Kamal Bazar</option>
    	           <option value="Upashahar">Upashahar</option>
    	           <option value="Subid Bazar">Subid Bazar</option>
    	         </select>
    	       </td>
    	   </tr>
    	   <tr>                
    	        <td>
    	          <label>Destination</label>
    	       </td>
    	       <td>
    	         <select id="select" name="dest">
    	           <option value="">Destination</option>
    	           <option value="Tilaghor">Tilaghor</option>
    	           <option value="Kamal Bazar">Kamal Bazar</option>
    	           <option value="Upashahar">Upashahar</option>
    	           <option value="Subid Bazar">Subid Bazar</option>
    	         </select>
    	       </td>
    	   </tr>
    	    <tr>
    	       <td>
    	          <label>Route</label>
    	       </td>
    	       <td>
    	           <select id="select" name="route">
    	           <option value="">Select Route</option>
    	           <option value="1">Route 1</option>
    	           <option value="2">Route 2</option>
    	           <option value="3">Route 3</option>
    	           <option value="4">Route 4</option>
    	         </select>
    	       </td>
    	   </tr>
    	   <tr>
    	        <td>
    	           <label>Time Between</label>
    	        </td>
    	        <td>
    	            <input type="time" name="t1"/>
    	            Between
    	            <input type="time" name="t2"/>
    	        </td>
    	    </tr>
    	    <tr>
    	       <td>
    	          <label>Date</label>
    	       </td>
    	       <td>
    	           <input style='width: 190px;'type='date'name="date"/>
    	       </td>
    	   </tr>
           		         
            <tr>
                <td></td>
                <td>
                    <input class='btn' type="submit" name="filter" Value="Apply Filter" />
                    <input class='btn' type="submit" name="all" Value="All Records" />
                </td>
            </tr>
        </table>
        </div>
        <?php } elseif(isset($list) && $list=='1'){?>
        <table class="data display datatable" id="example">
            <thead>
               <tr>
                 <th>SL</th>
                 <th>Bus ID</th>
                 <th>From</th>
                 <th>Destination</th>
                 <th>Route</th>
                 <th>Seats</th>
                 <th>booked</th>
                 <th>date</th>
                 <th>Start</th>
                 <th>Reached</th>
                 <th>Action</th>
               </tr>
            </thead>
            <tbody>
                <?php
                    $i=0;
                    if($filterBusRecord){
                        while($result=$filterBusRecord->fetch_assoc()){
                            $i++;     
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $i;?></td>
                    <td><?php echo $result['busid'];?></td>
                    <td><?php echo $result['frm'];?></td>
                    <td><?php echo $result['dest'];?></td>
                    <td><?php echo $result['route'];?></td>
                    <td><?php echo $result['seats'];?></td>
                    <td><?php echo $result['booked'];?></td>
                    <td><?php echo $result['datee'];?></td>
                    <td><?php echo $result['start'];?></td>
                    <td><?php echo $result['reach'];?></td>
                    <td>
                        <a class='btn'onclick="return confirm('Are you sure?')" href="?delid=<?php echo $result['busid'];?>">Delete</a>
                    </td>
                </tr>
            <?php } }?>
            </tbody>
        </table>
        <?php }elseif(isset($alltable) && $alltable=='1'){?>
        <table class="data display datatable" id="example">
            <thead>
                 <tr>
                      <th>SL</th>
                 <th>Bus ID</th>
                 <th>From</th>
                 <th>Destination</th>
                 <th>Route</th>
                 <th>Seats</th>
                 <th>booked</th>
                 <th>date</th>
                 <th>Start</th>
                 <th>Reached</th>
                 <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 <?php
                     $i=0;
                     if($busAllRecord){
                         while($result=$busAllRecord->fetch_assoc()){
                             $i++;     
                 ?>
                 <tr class="odd gradeX">
                     <td><?php echo $i;?></td>
                    <td><?php echo $result['busid'];?></td>
                    <td><?php echo $result['frm'];?></td>
                    <td><?php echo $result['dest'];?></td>
                    <td><?php echo $result['route'];?></td>
                    <td><?php echo $result['seats'];?></td>
                    <td><?php echo $result['booked'];?></td>
                    <td><?php echo $result['datee'];?></td>
                    <td><?php echo $result['start'];?></td>
                    <td><?php echo $result['reach'];?></td>
                    <td>
                        <a class='btn' onclick="return confirm('Are you sure?')" href="?delid=<?php echo $result['busid'];?>">Delete</a>
                    </td>
                 </tr>
             <?php } }?>      
             </tbody>
        </table>
        <?php }?>
        </form>
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


