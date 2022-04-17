  <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
 ?>
 <?php
    $admin=new Admin();
    $userid=Session::get('id');
    $role=Session::get('role');
 ?>
 <?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
         $profile=$admin->profileEdit($_POST, $_FILES);
     }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Profile</h2>
                <div class="block"> 
                <div style="width: 900px;"class="block copyblock"> 
            <?php
                if(isset($profile)){
                    echo $profile;
                }
            ?>
                <?php
                    $user=$admin->adminData($userid, $role);
                    if($user){
                        while($result=$user->fetch_assoc()){ 
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
                                <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name:</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $result['username'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Email: </label>
                            </td>
                            <td>
                                 <input type="text" name="email" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Phone:</label>
                            </td>
                            <td>
                                
                                <input type="text" name='phone' value="<?php echo $result['phone'];?>"class="medium" />
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
                        <tr>
                            <td>
                                <label>Upload Image:</label>
                            </td>
                            <td>
                                <input name='image' type="file" />
                            </td>
                        </tr>
                        <tr>
                        <td>
                            <label>Hometown:</label>
                        </td>
                        <td>
                             
                            <input type="text" name='hometown' value="<?php echo $result['hometown'];?>" class="medium" />
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Current Address:</label>
                            </td>
                            <td>
                            
                                <input type="text" name='curaddress' value="<?php echo $result['curaddress'];?>"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Pin:</label>
                            </td>
                            <td>
                            
                                <input type="text" name='pin' value="<?php echo $result['pin'];?>" class="medium" />
                            </td>
                        </tr>
                         
                         <tr>
                            <td>
                                <label>Role:</label>
                            </td>
                            <td>
                                <input readonly style="background-color: #bbc4ca7a;" type="text" name="role" value="<?php echo $result['role'];?>" class="medium" />
                            <!--<?php 
                                $adminRole=$result['role'];
                                if(($userid=='1001' && $adminRole=='Admin') || $userid!='1001'){?>
                                <input readonly style="background-color: #bbc4ca7a;" type="text" name="role" value="<?php echo $result['role'];?>" class="medium" />
                            <?php } else{ ?>
                                <select id='select' name="role" 
                                     <option value="NULL">Select User's Role</option>
                                     <option value="Student Admin">Student Admin</option>
                                     <option value="Bus Admin">Bus Admin</option>
                                 </select>
                             <?php }?>-->
                            </td>
                        </tr>
                          
                        <tr>
                            <td></td>
                            <td>
                                <input class='btn' type="submit" name="submit" Value="Update" />
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