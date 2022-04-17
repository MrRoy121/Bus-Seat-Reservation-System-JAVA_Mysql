<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $bus=new Bus();
    $userid=Session::get('id');
    $role=Session::get('role')
?>
 <?php
  if(!isset($_GET['busid']) || $_GET['busid']==NULL){
        //header("Location: bushistory.php");
        echo "<script>window.location='bushistory.php'</script>";
  }
  elseif(isset($_GET['busid']) && $_GET['busid']!=NULL){
    //filtering
    $busid=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['busid']);    
  }if(isset($_GET['busid']) && $_GET['busid']!=NULL && isset($_GET['date']) && $_GET['date']!=NULL && isset($_GET['route']) && $_GET['route']!=NULL && isset($_GET['start']) && $_GET['start']!=NULL && isset($_GET['reach']) && $_GET['reach']!=NULL){
    //filtering
    $busid=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['busid']); 
    $date=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['date']);
    $route=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['route']);
    $start=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['start']);
    $reach=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['reach']);
     $deleteRecordById=$bus->deleteBusRecordById($busid, $date, $route, $start, $reach);  
  }
?>
<style>
  span .btn:hover{
     background-color: red;
  }
</style>
        <div class="grid_10">
            <div class="box round first grid">
               
                <h2>Bus Record By ID</h2>

                <div class="block"> 
                <div> 
                <?php
                  if(isset($reachedBus)){
                    echo $reachedBus;
                  }elseif(isset($deleteRecordById)){
                    echo $deleteRecordById;
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
              <th>Seats</th>
              <th>booked</th>
              <th>date</th>
              <th>Start</th>
              <th>Reached</th>
              <th width='8%'>Action</th>
              <th width='9%'>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i=0;
              $getIndividualBusRecord=$bus->getIndividualBusRecord($busid);
              if($getIndividualBusRecord){
                while($result=$getIndividualBusRecord->fetch_assoc()){  
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
              <?php if($role=='BusAdmin' || $userid=='1001'){ ?>
              <td>
                <span><a class='btn' onclick="return confirm('Are you sure to Delete?')" href="?busid=<?php echo $result['busid'];?>&&date=<?php echo $result['datee'];?>&&route=<?php echo $result['route'];?>&&start=<?php echo $result['start'];?>&&reach=<?php echo $result['reach'];?>">Delete</a><span>
                 
              </td>
            <?php }else{ ?>
              <td style="text-align:center;">
                <a class='btn' style="background-color: #ef4545">Resticted</a>
              </td>
            <?php }?>
              <td>
                <?php
                  if($result['status']=='2'){?>
                <a style='background-color: red; width: 50px;' class='btn'>Canceled</a>
            <?php }else{ ?>
              <a style='background-color: 
              #1acc1a; width: 50px;' class='btn'>Reached</a>
            <?php }?>
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

