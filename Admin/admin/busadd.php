<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    
?>
<?php
    $bus=new Bus();
    $userid=Session::get('id');
    $role=Session::get('role');
    if($role!='BusAdmin' && $userid!='1001' && $role!='Admin'){ 
          echo "<script>window.location='dashboard.php';</script>";   
    }
?>
<?php
    //if(isset($_POST['submit'])){}
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $addBus=$bus->busAdd($_POST);
    }
?>
<?php
  date_default_timezone_set("Asia/Dhaka");
  $time=date("H:i:s");
  $date=date("Y/m/d");
  $availUpdate=$bus->updateAvailableBus($time,$date);
?>
 
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Student</h2>
        <div class="block"> 
        <div class="block copyblock"> 
        <?php
            if(isset($addBus)){
                echo  $addBus;
            }
        ?>              
         <form action="" method="post">
            <table class="form">
                <tr>
                    <td>
                        <label>Bus ID</label>
                    </td>
                   <td> <input type="text" name="busid" placeholder="Enter Bus ID" class='medium'/> </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Number Plate</label>
                    </td>
                   <td><input type="text" name="nplate" placeholder="Number Plate" class='medium'/>  </td>
                </tr>
                <tr>
                    <td>
                        <label>Seats</label>
                    </td>
                 <td>
                   <select id="select" name="seats" >
                        <option value="">Seats</option>
                        <option value="38">38</option>
                        <option value="71">71</option>
                    </select>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input class='btn' type="submit" name="submit" Value="Add Bus" class='medium' />
 
                    </td>
                </tr>
            </table>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


