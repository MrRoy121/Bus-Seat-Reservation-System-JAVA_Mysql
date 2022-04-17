<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include '../classes/Student.php';
?>
<?php
    $student=new Student();
    $userid=Session::get('id');
    $role=Session::get('role');
    if($role!='StudentAdmin' && ($role!='Admin' && $userid!='1001')){ 
          echo "<script>window.location='dashboard.php';</script>";   
    }
?>
<?php
    if(!isset($_GET['editid']) || $_GET['editid']==NULL){
        //header("Location: catlist.php");
        echo "<script>window.location='studentslistAll.php'</script>";
    }else{
        $editid= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['editid']);
    }
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $studentEditAll=$student->studentEditAll($_POST, $_FILES, $editid);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Student Info</h2>
        <div class="block"> 
        <div class="block copyblock"> 
        <?php
            if(isset($studentEditAll)){
                echo  $studentEditAll;
            }
        ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <?php
                    $getStudentData=$student->getAllStudentById($editid);
                    if($getStudentData){
                        while($value=$getStudentData->fetch_assoc()){
                 ?> 
                <tr>
                    <td>
                        <label>Student ID</label>
                    </td>
                    <td>
                        <input style="background-color: #bbc4ca7a;" readonly="readonly" type="text" name='studentid'class='medium' value="<?php echo $value['id']?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Student Name</label>
                    </td>
                    <td>
                        <input type="text" name='name' class='medium' value="<?php echo $value['studentName']?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Dept</label>
                    </td>
                    <td>
                        <select id="select" name="dept">
                        <option value="">Depertments</option>
                        <option value='English'
                        <?php
                          if(trim($value['dept'])=='English'){
                            echo 'selected';
                          }
                        ?>>English</option>
                        <option value='IS'
                        <?php
                          if(trim($value['dept'])=='Islamic Studies'){
                            echo 'selected';
                          }
                        ?>>Islamic Studies</option>
                        <option value='CSE'
                        <?php
                            if(trim($value['dept'])=='CSE'){
                                echo 'selected';
                            }
                        ?>>CSE</option>
                        <option value='EEE'
                        <?php
                          if(trim($value['dept'])=='EEE'){
                            echo 'selected';
                          }
                        ?>>EEE</option>
                        <option value='BBA'
                        <?php
                          if(trim($value['dept'])=='BBA'){
                            echo 'selected';
                          }
                        ?>>BBA</option>
                        <option value="ARC"
                        <?php
                          if(trim($value['dept'])=='ARC'){
                            echo 'selected';
                          }
                        ?>>Architecture</option>
                        <option value='Civil'
                        <?php
                          if(trim($value['dept'])=='Civil'){
                            echo 'selected';
                          }
                        ?>>Civil Engineering</option>
                        <option value='Bangla'
                        <?php
                          if(trim($value['dept'])=='Bangla'){
                            echo 'selected';
                          }
                        ?>>Bangla</option>
                        <option value='Others'
                        <?php
                          if(trim($value['dept'])=='Others'){
                            echo 'selected';
                          }
                        ?>>Others</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name='email' class='medium' value="<?php echo $value['email']?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" name='phone' class='medium' value="<?php echo $value['phone']?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>DOB</label>
                    </td>
                    <td>
                        <input type="date" name='dob' class='medium' value="<?php echo $value['dob']?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Semester</label>
                    </td>
                    <td>
                        
                        <select id="select" name="semester">
                        <option value="">Semester</option>
                        <option value="1"
                        <?php
                          if($value['semester']=='1'){
                            echo 'selected';
                          }
                        ?>>1</option>
                        <option value="2"
                        <?php
                          if($value['semester']=='2'){
                            echo 'selected';
                          }
                        ?>>2</option>
                        <option value="3"
                        <?php
                          if($value['semester']=='3'){
                            echo 'selected';
                          }
                        ?>>3</option>
                        <option value="4"
                        <?php
                          if($value['semester']=='4'){
                            echo 'selected';
                          }
                        ?>>4</option>
                        <option value="5"
                        <?php
                          if($value['semester']=='5'){
                            echo 'selected';
                          }
                        ?>>5</option>
                        <option value="6"
                        <?php
                          if($value['semester']=='6'){
                            echo 'selected';
                          }
                        ?>>6</option>
                        <option value="7"
                        <?php
                          if($value['semester']=='7'){
                            echo 'selected';
                          }
                        ?>>7</option>
                        <option value="8"
                        <?php
                          if($value['semester']=='8'){
                            echo 'selected';
                          }
                        ?>>8</option>
                        <option value="9"
                        <?php
                          if($value['semester']=='9'){
                            echo 'selected';
                          }
                        ?>>9</option>
                        <option value="10"
                        <?php
                          if($value['semester']=='10'){
                            echo 'selected';
                          }
                        ?>>10</option>
                        <option value="11"
                        <?php
                          if($value['semester']=='11'){
                            echo 'selected';
                          }
                        ?>>11</option>
                        <option value="12"
                        <?php
                          if($value['semester']=='12'){
                            echo 'selected';
                          }
                        ?>>12</option>
                        <option value="Others"
                        <?php
                          if($value['semester']=='Others'){
                            echo 'selected';
                          }
                        ?>>Others</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Section</label>
                    </td>
                    <td>
                        <select id="select" name="section">
                        <option value="">Section</option>
                        <option value="A"
                        <?php
                          if($value['section']=='A'){
                            echo 'selected';
                            }
                        ?>>A</option>
                        <option value="B"
                        <?php
                          if($value['section']=='B'){
                            echo 'selected';
                            }
                        ?>>B</option>
                        <option value="C"
                        <?php
                          if($value['section']=='C'){
                            echo 'selected';
                            }
                        ?>>C</option>
                        <option value="D"
                        <?php
                          if($value['section']=='D'){
                            echo 'selected';
                            }
                        ?>>D</option>
                        <option value="E"
                        <?php
                          if($value['section']=='E'){
                            echo 'selected';
                            }
                        ?>>E</option>
                        <option value="F"
                        <?php
                          if($value['section']=='F'){
                            echo 'selected';
                            }
                        ?>>F</option>
                        <option value="G"
                        <?php
                          if($value['section']=='G'){
                            echo 'selected';
                            }
                        ?>>G</option>
                        <option value="H"
                        <?php
                          if($value['section']=='H'){
                            echo 'selected';
                            }
                        ?>>H</option>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Image</label>
                    </td>
                    <td>
                         <img src="<?php echo $value['img'];?>" style="height:35px; width: 50px"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input name='image' class='medium' type="file" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Hometown</label>
                    </td>
                    <td>
                        <input type="text" name='hometown' value="<?php echo $value['hometown']?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Current Address</label>
                    </td>
                    <td>
                        <input type="text" name='curaddress' class='medium' value="<?php echo $value['current_address']?>"/>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input class='btn' type="submit" name="submit" class='medium' Value="Update" />
                    </td>
                </tr>
                <?php }} ?> 
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


