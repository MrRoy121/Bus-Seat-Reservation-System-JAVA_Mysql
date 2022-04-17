<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $bus=new Bus();
    $userid=Session::get('id');
    $role=Session::get('role');
    if($role!='BusAdmin' && $userid!='1001'){ 
          echo "<script>window.location='dashboard.php';</script>";   
    }
?>
<?php
  $bus=new Bus();
  date_default_timezone_set("Asia/Dhaka");
  $time=date("H:i:s", (time() - 1));
  $date=date("Y/m/d");
  $availUpdate=$bus->updateAvailableBus($time,$date);
?>
<?php
    if(!isset($_GET['busid']) || $_GET['busid']==NULL){
      echo "<script>window.location='busavailable.php</script>";
    }else{
       $busid= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['busid']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['back'])){
       echo "<script>window.location='busavailable.php'</script>";
    }else if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $busid=$_POST["busid"];
        $nplate=$_POST["nplate"];
        $from=$_POST["from"];
        $dest=$_POST["dest"];
        $route=$_POST["route"];
        $driverid=$_POST["driverid"];
        $seats=$_POST["seats"];
        $date=$_POST["date"];
        $start=$_POST["start"];
        $reach=$_POST["reach"];
        $busSend=$bus->busSend($busid,$nplate,$from,$dest,$route,$driverid,$seats,$date,$start,$reach);
    }
?>
<style>
      input.medium{
      background-color: #dedada1f;
    }
</style>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Send A Bus</h2>
        <div class="block copyblock"> 
         <?php
            if(isset($busSend)){
                echo $busSend;
            }
        ?>
         <form action="" method="post">
            <table class="form">	
              <?php
                  $getbus=$bus->getBusbyId($busid);
                  if($getbus){
                    while($result=$getbus->fetch_assoc()){?>
                <tr>				
                     <td>
                       <label>Bus ID:</label>
                    </td>
                    <td>
                        <input style="background-color: #bbc4ca7a;" readonly="readonly" type="text" name="busid" class='medium'value="<?php echo $result['busid']; ?>"
                    </td>
                </tr>
                 <tr>       
                     <td>
                       <label>Number Plate:</label>
                    </td>
                    <td>
                        <input style="background-color: #bbc4ca7a;" readonly="readonly" type="text" name="nplate" class='medium' value="<?php echo $result['nplate']; ?>"
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
                       <label>Destination:</label>
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
                       <label>Driver ID:</label>
                    </td>
                    <td>
                        <input type="number" name="driverid" class="medium" />
                    </td>
                </tr>
                
                 <tr>
                    <td>
                       <label>Route:</label>
                    </td>
                    <td>
                        <select id="select" name="route">
                        <option value="">Select Route</option>
                        <option value="01">Route 1</option>
                        <option value="02">Route 2</option>
                        <option value="03">Route 3</option>
                        <option value="04">Route 4</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label>Seats:</label>
                    </td>
                    <td>
                        <input style="background-color: #bbc4ca7a;" readonly="readonly" name="seats"  class="medium" class='medium' value="<?php echo $result['seats']; ?>"/>
                    </td>
                </tr>
                 <tr>
                    <td>
                       <label>Date:</label>
                    </td>
                    <td>
                        <input style="background-color: #bbc4ca7a;" readonly="readonly" name="date"  class="medium" class='medium' value="<?php 
                         date_default_timezone_set("Asia/Dhaka");
                        echo date("Y/m/d");?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label>Start At:</label>
                    </td>
                    <td>
                        <input type="time" name="start" class='medium' class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                       <label>Reached At:</label>
                    </td>
                    <td>
                        <input type="time" name="reach" class="medium" />
                    </td>
                </tr>
		            <tr> 
                  <td></td>
                    <td>
                        <input class='btn' type="submit" name="submit" Value="Send" />
                        <input type="submit" name="back"  class='btn' Value="Back" /> 
                    </td>
                </tr>
                  <?php } }?>
            </table>
            </form>
        
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>

