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
    if(!isset($_GET['busid']) || $_GET['busid']==NULL){
        //header("Location: catlist.php");
        echo "<script>window.location='buslist.php'</script>";
    }else{
        $busid= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['busid']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $busid=$_POST["busid"];
        $nplate=$_POST["nplate"];
        $seats=$_POST["seats"];
        $busupdate=$bus->busUpdate($busid,$nplate,$seats);
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Bus Info</h2>
                <div class="block copyblock"> 
                 <?php
                    if(isset($busupdate)){
                        echo $busupdate;
                    }
                ?>
                <?php
                    $getbus=$bus->getBusbyId($busid);
                    if($getbus){
                        while($result=$getbus->fetch_assoc()){
                ?>
                 <form action="" method="post">
                    <table class="form">	
                        <tr>				
                             <td>
                               <label>Bus ID</label>
                            </td>
                            <td>
                                <input style="background-color: #bbc4ca7a;" readonly="readonly" type="text" name="busid" value="<?php echo $result['busid'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                               <label>Number Plate</label>
                            </td>
                            <td>
                                <input type="text" name="nplate" value="<?php echo $result['nplate'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                               <label>Seats</label>
                            </td>
                            <td>
                                <input type="text" name="seats" value="<?php echo $result['seats'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input class='btn' type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }} ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>