<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
  $bus=new Bus();
?>
<?php
  date_default_timezone_set("Asia/Dhaka");
  $time=date("H:i:s", (time() -1));
  $date=date("Y/m/d");
  $availUpdate=$bus->updateAvailableBus($time,$date);
?>

<?php
  if(!isset($_GET['busid']) || $_GET['busid']==NULL){
     echo "<script>window.location='busavailable.php'</script>";
  }else{
    $busid= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['busid']);
    $checkBus=$bus->checkOnRoadBus($busid);
    if(!$checkBus){
       echo "<script>window.location='busavailable.php'</script>";
    }
  }
?>
<?php
   if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['submit'])){
          $busUpdate=$bus->updateBusOnRoad($_POST);
        }elseif(isset($_POST['back'])){
             echo "<script>window.location='busview.php'</script>";
        }
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Bus View</h2>
        <div class="block copyblock"> 
          <?php
            if(isset($busUpdate)){
              echo $busUpdate;
            }
          ?>
          <?php
            $getBus=$bus->getSendBusbyId($busid);
           if($getBus){
              while($result=$getBus->fetch_assoc()){  
          ?>
         <form action="" method="post">
            <table class="form">	
                <tr>				
                     <td>
                       <label>Bus ID</label>
                    </td>
                    <td>
                        <input readonly='readonly' type="text" name="busid" value="<?php echo $result['busid']; ?>" class="medium"/>
                    </td>
                </tr>
                <tr>                
                     <td>
                       <label>From</label>
                    </td>
                    <td>
                      <select id="select" name="from">
                        <option value="">Start From</option>
                        <option value="Tilaghor" 
                        <?php
                          if($result['frm']=='Tilaghor'){
                            echo 'selected';
                          }
                        ?>>Tilaghor</option>
                        <option value="Kamal Bazar"
                        <?php
                          if($result['frm']=='Kamal Bazar'){
                            echo 'selected';
                          }
                        ?>>Kamal Bazar</option>
                        <option value="Upashahar"
                        <?php
                          if($result['frm']=='Upashahar'){
                            echo 'selected';
                          }
                        ?>>Upashahar</option>
                        <option value="Subid Bazar"
                        <?php
                          if($result['frm']=='Subid Bazar'){
                            echo 'selected';
                          }
                        ?>>Subid Bazar</option>
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
                        <option value="Tilaghor"
                        <?php
                          if($result['dest']=='Tilaghor'){
                            echo 'selected';
                          }
                        ?>>Tilaghor</option>
                        <option value="Kamal Bazar"
                        <?php
                          if($result['dest']=='Kamal Bazar'){
                            echo 'selected';
                          }
                        ?>>Kamal Bazar</option>
                        <option value="Upashahar"
                        <?php
                          if($result['dest']=='Upashahar'){
                            echo 'selected';
                          }
                        ?>>Upashahar</option>
                        <option value="Subid Bazar"
                        <?php
                          if($result['dest']=='Subid Bazar'){
                            echo 'selected';
                          }
                        ?>>Subid Bazar</option>
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
                        <option value="1" 
                        <?php
                          if($result['route']=='1'){
                            echo 'selected';
                          }
                        ?>>Route 1</option>
                        <option value="2" 
                        <?php
                          if($result['route']=='2'){
                            echo 'selected';
                          }
                        ?>>Route 2</option>
                        <option value="3"
                        <?php
                          if($result['route']=='3'){
                            echo 'selected';
                          }
                        ?>>Route 3</option>
                        <option value="4"
                        <?php
                          if($result['route']=='4'){
                            echo 'selected';
                          }
                        ?>>Route 4</option>
                      </select>
                    </td>
                </tr>
                 <tr>
                    <td>
                       <label>Date</label>
                    </td>
                    <td>
                        <input readonly='readonly' type="date" name="date" value="<?php echo $result['datee']; ?>" class="medium"/>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label>Seats</label>
                    </td>
                    <td>
                        <input readonly='readonly' type="number" name="seats" value="<?php echo $result['seats'];?>" class="medium"/>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label>Seat Booked</label>
                    </td>
                    <td>
                        <input readonly='readonly' type="text" name="booked" value="<?php echo '30'; ?>" class="medium"/>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label>Start At</label>
                    </td>
                    <td>
                        <input type='time' name="start" value="<?php echo $result['start']; ?>" class="medium"/>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label>Reached At</label>
                    </td>
                    <td>
                        <input type='time' name="reach" value="<?php echo $result['reach']; ?>" class="medium"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class='btn' type="submit" name="submit" Value="Update" />
                        <input style='width:100px;' class='btn' type="submit" name="back" Value="Back" />
                    </td>
                </tr>
            </table>
            </form>
          <?php } } ?>
        
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>