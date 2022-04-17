<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?> 
<?php
    if(Session::get('userid')!='1001'){ 
          echo "<script>window.location= 'dashboard.php';</script>";   
    }
    $admin=new Admin();
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
       $addAdmin=$admin->addAdmin($_POST, $_FILES);
    }
?>
   <div class="grid_10">
        <div class="box round first grid">
        <h2>Add New User</h2>
        <div style='width: 930px;' class="block copyblock"> 
            <?php 
                if(isset($addAdmin)){
                    echo  $addAdmin;
                }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Admin ID:</label>
                            </td>
                            <td>
                                <input  type="text" name="id" placeholder='ID' class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Name:</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder='Name' class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name:</label>
                            </td>
                            <td>
                                <input type="text" name="username" placeholder='Username' class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Email: </label>
                            </td>
                            <td>
                                 <input type="text" name="email" placeholder='Email' class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Password: </label>
                            </td>
                            <td>
                                 <input type="text" name="password" placeholder='Password' class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Phone:</label>
                            </td>
                            <td>
                                
                                <input type="text" name='phone' placeholder='Phone' class="medium" />
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label>Upload:</label>
                            </td>
                            <td>
                                <input type="file" name='image' type="file" />
                            </td>
                        </tr>
                        <tr>
                        <td>
                            <label>Hometown:</label>
                        </td>
                        <td>
                             
                            <input type="text" name='hometown' placeholder='Hometown' class="medium" />
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Current Address:</label>
                            </td>
                            <td>
                            
                                <input type="text" name='curaddress' placeholder='Current Address'  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Pin:</label>
                            </td>
                            <td>
                            
                                <input type="text" name='pin' placeholder='Pin' class="medium" />
                            </td>
                        </tr>
                         
                         <tr>
                            <td>
                                <label>Role:</label>
                            </td>
                            <td>
                                <select id='select' name="role">
                                     <option value="">User's Role</option>
                                     <option value="Admin">Admin</option>
                                     <option value="StudentAdmin">Student Admin</option>
                                     <option value="BusAdmin">Bus Admin</option>
                                </select>
                            </td>
                        </tr>
                          
                        <tr>
                            <td></td>
                            <td>
                                <input class='btn' type="submit" name="submit" Value="Add User" />
                            </td>
                        </tr>
                    </table>
         
                    </form>
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

