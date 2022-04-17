  <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
 ?>
 <?php
    $admin=new Admin();
    $userid=Session::get('id');
    $role=Session::get('role');
    if($role!='Admin' ){ 
          echo "<script>window.location='userlist.php';</script>";   
    }
?>
 <?php
    if(!isset($_GET['adminid']) || $_GET['adminid']==NULL || ($_GET['adminid']=='1001' && $userid!='1001')){
        //header("Location: catlist.php");
        echo "<script>window.location='userlist.php'</script>";
    }else{
        $adminid= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['adminid']);
    }
 ?>
 <?php
  
 ?>
 <?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['submit'])  && $userid=='1001'){
           $update=$admin->profileEdit($_POST, $_FILES);
        }if(isset($_POST['back'])){
              echo "<script>window.location='userlist.php'</script>";
        }  
     }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>User Profile</h2>
                <div class="block"> 
                <div style="width: 900px;"class="block copyblock"> 
            <?php
                if(isset($update)){
                    echo $update;
                }
            ?>
                <?php
                    $admin=$admin->adminView($adminid);
                    if($admin){
                        while($result=$admin->fetch_assoc()){ 
                ?>
                               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Admin ID:</label>
                            </td>
                            <td>
                                <input style="background-color: #bbc4ca7a;" type="text" readonly name="id" value="<?php echo $result['id'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Name:</label>
                            </td>
                            <td>
                                <input type="text" name="name" <?php if($userid!='1001'){?> readonly style="background-color: #bbc4ca7a;" <?php }?> value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name:</label>
                            </td>
                            <td>
                                <input type="text" name="username" <?php if($userid!='1001'){?> readonly style="background-color: #bbc4ca7a;" <?php }?> value="<?php echo $result['username'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Email: </label>
                            </td>
                            <td>
                                 <input type="text" name="email" <?php if($userid!='1001'){?> readonly style="background-color: #bbc4ca7a;" <?php }?> value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Phone:</label>
                            </td>
                            <td>
                                
                                <input type="text" name='phone' <?php if($userid!='1001'){?> readonly style="background-color: #bbc4ca7a;" <?php }?> value="<?php echo $result['phone'];?>"class="medium" />
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label>Image:</label>
                            </td>
                            <td>
                                 <img src="<?php echo $result['img'];?>" style="height:35px; width: 50px"/>
                            </td>
                         </tr>
                         <?php if($userid=='1001'){?>   
                        <tr>
                            <td>
                                <label>Upload Image:</label>
                            </td>
                            <td>
                                <input name='image' type="file" />
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
                        <td>
                            <label>Hometown:</label>
                        </td>
                        <td>
                             
                            <input type="text" name='hometown' <?php if($userid!='1001'){?> readonly style="background-color: #bbc4ca7a;" <?php }?> value="<?php echo $result['hometown'];?>" class="medium" />
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Current Address:</label>
                            </td>
                            <td>
                            
                                <input type="text" name='curaddress' <?php if($userid!='1001'){?> readonly style="background-color: #bbc4ca7a;" <?php }?> value="<?php echo $result['curaddress'];?>"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Pin:</label>
                            </td>
                            <td>
                            
                                <input type="text" name='pin' <?php if($userid!='1001'){?> readonly style="background-color: #bbc4ca7a;" <?php }?> value="<?php echo $result['pin'];?>" class="medium" />
                            </td>
                        </tr>
                         
                         <tr>
                            <td>
                                <label>Role:</label>
                            </td>
                            <td>
                            <?php 
                                if($userid!='1001' || $adminid=='1001'){?>
                                <input readonly style="background-color: #bbc4ca7a;" type="text" name="role" value="<?php echo $result['role'];?>" class="medium" />
                            <?php } else{ ?>
                                <select id='select' name="role">
                                     <option value="">User's Role</option>
                                     <option <?php if($result['role']=='Admin'){?> selected <?php } ?> value="Admin">Admin</option>
                                     <option <?php if($result['role']=='StudentAdmin'){?> selected <?php } ?> value="StudentAdmin">Student Admin</option>
                                     <option <?php if($result['role']=='BusAdmin'){?> selected <?php } ?> value="BusAdmin">Bus Admin</option>
                                 </select>
                             <?php }?>
                            </td>
                        </tr>
                          
                        <tr>
                            <td></td>
                            <td>
                               <?php if($userid=='1001'){?>
                                <input class='btn' type="submit" name="submit" Value="Update" /><?php }?>
                                <input class='btn' type="submit" name="back" Value="Back" />
                            </td>
                        </tr>
                    </table>
         
                    </form>
                <?php } } ?>
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
<?php include 'inc/footer.php'; ?>  