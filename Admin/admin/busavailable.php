<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $bus=new Bus();
    $userid=Session::get('id');
    $role=Session::get('role');
?>
<?php
    if(isset($_GET['busid']) && $_GET['busid']!=NULL){
        $delid=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['busid']);//filtering
        $delbus=$bus->delBusbyId($delid);   
    }
?> 
<?php
  date_default_timezone_set("Asia/Dhaka");
  $time=date('H:i:s', strtotime('-2 seconds'));
  $date=date("Y/m/d");
  $availUpdate=$bus->updateAvailableBus($time,$date);
?>
<style>        
   .scs{color: green;}
   .rd{color: red;}
   span.success{color: #ff9900;}
   span.error{color: #1acc1a;}
   .btn:hover{
        background-color: #1acc1a;
    }
     .odd,.gradeX td{
        text-align: center;
    }
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Bus Send</h2>
                <?php
                    if(isset($delbus)){
                        echo $delbus;
                    }
                ?>
                <div class="block">     
                    <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Bus ID</th>
                            <th>Number Plate</th>
                            <th>Seats</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            $getBus=$bus->busList();
                            if($getBus){
                                while($result=$getBus->fetch_assoc()){  
                                    $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['busid'];?></td>
                            <td><?php echo $result['nplate'];?></td>
                            <td><?php echo $result['seats'];?></td>
                            <td><?php 
                                 $status=$result['status'];
                                 if($status=='0'){
                                    echo "<span class='success'>Available</span>";
                                 }else{
                                    echo "<span class='error'>On Road</span>";
                                 }
                            ?></td>
                    <?php
                        if($role=='BusAdmin' || $userid=='1001'){?>
                            <td>
                                <?php
                                    $status=$result['status'];
                                    if($status=='0'){
                                ?>
                                <a class='btn' href="bussend.php?busid=<?php echo $result['busid'];?>">Send</a>
                            <?php }else{?>
                                <a class='btn' style='background-color: #1acc1a;' href="busview.php?busid=<?php echo $result['busid'];?>">View</a>
                           <?php }?>
                            </td>
                    <?php }else{
                       if($result['status']=='0'){ ?>
                       <td style="text-align:center;">
                           <a class='btn' style="background-color: #ef4545">Resticted</a>
                       </td>
                    <?php }else{ ?>
                      <td style="text-align:center;">
                           <a class='btn' style="background-color: #1acc1a; width: 57px;">On Road</a>
                      </td>
                    <?php } } ?>
                        </tr>
                    <?php } }
                    else{
                        echo "<span class='error'>Buses info Not Found<span>";
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