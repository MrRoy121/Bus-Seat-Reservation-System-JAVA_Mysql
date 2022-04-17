<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
     
?>
<?php
    $student=new Student();
?>
<?php
    $admin=new Admin();
    $userid=Session::get('id');
    $role=Session::get('role');
    if($role!='Admin' && $userid!='1001'){ 
          echo "<script>window.location='dashboard.php';</script>";   
    }
?>
<?php
    //if(isset($_POST['submit'])){}
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $addStudent=$student->studentAdd($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Student</h2>
        <div class="block"> 
        <div class="block copyblock"> 
        <?php
            if(isset($addStudent)){
                echo  $addStudent;
            }
        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               <tr>
                    <td>
                        <label>Student ID:</label>
                    </td>
                   <td> <input type="text" name="studentid" placeholder="Student ID" class='medium'/> </td>
                </tr>
                <tr>
                    <td>
                        <label>Student Name:</label>
                    </td>
                    <td>
                        <input type="text" name="studentName" placeholder="Name" class='medium'/> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Depertment:</label>
                    </td>
                    <td>
                       <select id="select" name="dept" >
                            <option value="">Depertment</option>
                            <option value="English">English</option>
                            <option value="IS">Islamic Studies</option>
                            <option value="CSE">CSE</option>
                            <option value="EEE">EEE</option>
                            <option value="BBA">BBA</option>
                            <option value="ARC">Architecture</option>
                            <option value="Civil">Civil Engineering</option>
                            <option value="Bangla">Bangla</option>
                            <option value="Others">Others</option>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Email:</label>
                    </td>
                   <td> <input type="email" name="email" class='medium' placeholder="Email"/> </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Phone:</label>
                    </td>
                   <td><input type="text" name="phone" placeholder="Phone" class='medium'/>  </td>
                </tr>
				<tr>
                    <td>
                        <label>DOB:</label>
                    </td>
                    <td><input type="date" name="dob" placeholder="DOB" class='medium'/> </td>
                </tr>
                 <tr>
                    <td>
                        <label>Semester:</label>
                    </td>
                    <td>
                        <select id="select" name="semester">
                            <option value="">Semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="Others">Others</option>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Section:</label>
                    </td>
                    <td>
                        <select id="select" name="section">
                            <option value="">Section</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Image:</label>
                    </td>
                    <td>
                        <input name='image' type="file" class='medium'/>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hometown:</label>
                    </td>
                    <td>
                        <input type="text" name="hometown" placeholder="Hometown" class='medium'/> </td>

                </tr>
                <tr>
                    <td>
                        <label>Current Address:</label>
                    </td>
                    <td>
                       <input type="text" name="curaddress" placeholder="Current Address" class='medium'/> 
                   </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input class='btn' type="submit" name="submit" Value="Add Student" class='medium'/>
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


