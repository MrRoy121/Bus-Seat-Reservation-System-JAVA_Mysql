<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
     $admin=new Admin();
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=$_POST["email"];
          $pin=$_POST["pin"];
        $opassword=$_POST["opassword"];
        $npassword=$_POST["npassword"];
        $resetPassword=$admin->changePassword($email,$pin, $opassword,$npassword);
     }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">    
        <div class="block copyblock"> 
        <?php
            if(isset($resetPassword)){
                echo $resetPassword;
            }
        ?>           
         <form action="" method="post">
            <table class="form">	
                 <tr>
                    <td>
                        <label>Email:</label>
                    </td>
                    <td>
                        <input type="email" placeholder="Enter Email"  name="email" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Pin Number:</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Pin"  name="pin" class="medium" />
                    </td>
                </tr>				
                <tr>
                    <td>
                        <label>Old Password:</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Old Password..."  name="opassword" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>New Password:</label>
                    </td>
                    <td>
                        <input style="" type="text" placeholder="Enter New Password..." name="npassword" class="medium" />
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
        </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>