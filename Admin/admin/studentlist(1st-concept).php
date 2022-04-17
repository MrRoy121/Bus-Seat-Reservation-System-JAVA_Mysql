<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $register=new Registration();
    
?>
<?php
    $list; $alltable;
    //if(isset($_POST['submit'])){}
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['filter'])){
            $studentList=$register->studentListFilter($_POST);
            if($studentList=='5'){
                $list='0';
            }else{
                $list='1';
            }
        }elseif(isset($_POST['all'])){
             $studentList=$register->registeredStudentList();
            if($studentList){
                $alltable='1';
            }else{
                $alltable='0';
            }
        }
    }
?>
<?php
    if(isset($_GET['delid']) && $_GET['delid']!=NULL ){
    //filtering
    $delid=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delid']); 
     
     $delStudent=$register->delRegStuById($delid); 
  }
?>
<div class="grid_10">
    <div class="box round first grid">
    <h2>Registered Students List</h2>
    <div class="block"> 
        <?php 
            if(isset($delStudent)){
                echo $delStudent;
            }
            if(isset($list) && $list=='0'){
                echo "<span class='error'>Can not filter Data!</span>";
            }
        ?>   
        <form action="" method="post" enctype="multipart/form-data">
        <?php
            if((!isset($list) && !isset($alltable)) || (isset($list) && $list=="0") ){
        ?>
        <table class="form">   
            <tr>
                <td>
                    <label>Depertment</label>
                </td>
                <td>
                    <select id="select" name="dept">
                        <option value="">Depertment</option>
                        <option value="English">English</option>
                        <option value="Islamic Studies">Islamic Studies</option>
                        <option value="CSE">CSE</option>
                        <option value="EEE">EEE</option>
                        <option value="BBA">BBA</option>
                        <option value="Architecture">Architecture</option>
                        <option value="Civil Engineering">Civil Engineering</option>
                        <option value="Public Health">Public Health</option>
                        <option value="Bangla">Bangla</option>
                        <option value="Others">Others</option>
                    </select>
                </td>
            </tr> 
            <tr>
                <td>
                    <label>Semester</label>
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
                    <label>Section</label>
                </td>
                <td><select id="select" name="section">
                    <option value="">Section</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                </select></td>
            </tr>  
            <tr>            
                <td>
                    <label>Route</label>
                </td>
                <td>
                    <select id="select" name="route">
                    <option value="">Select Route</option>
                    <option value="1">Route 1</option>
                    <option value="2">Route 2</option>
                    <option value="3">Route 3</option>
                    <option value="4">Route 4</option>
                    </select>
              </td>
            </tr>
            <tr>              
                <td>
                    <label>PUP</label>
                </td>
                <td><select name="pick">
                    <option value="">Select PUP</option>
                    <option value="Upashahar">Upashahar</option>
                    <option value="Tilaghor">Tilaghor</option>
                    <option value="Humayun v">Humayun Chattar</option>
                    <option value="Mirer Moidan">Mirer Moidan</option>
                </select></td>
            </tr>
           
            <tr>
                <td></td>
                <td>
                    <input class='btn' type="submit" name="filter" Value="Apply Filter" />
                    <input class='btn' type="submit" name="all" Value="All Registered Students" />
                </td>
            </tr>
        </table>
            <?php } elseif((isset($list) && $list=='1') || (isset($alltable) && $alltable=='1') ){?>
          <table class="data display datatable" id="example">
              <thead>
                  <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>ID</th>
                      <th>DEPT</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Phone</th>
                      <th>DOB</th>
                      <th>SEM</th>
                      <th>SEC</th>
                      <th>Image</th>
                      <th>RT</th>
                      <th>PUP</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                      $i=0;
                      if($studentList){
                          while($result=$studentList->fetch_assoc()){
                              $i++;     
                  ?>
                  <tr class="odd gradeX">
                      <td><?php echo $i;?></td>
                      <td><?php echo $result['studentName'];?></td>
                      <td><?php echo $result['studentid'];?></td>
                      <td><?php echo $result['dept'];?></td>

                      <td><?php echo $result['email'];?></td>
                      <td><?php echo $result['password'];?></td>
                      <td><?php echo $result['phone'];?></td>
                      <td><?php echo $result['dob'];?></td>
                      <td><?php echo $result['semester'];?></td>
                      <td><?php echo $result['section'];?></td>
                       <td ><img style="height: 35px; width: 55px;" src="<?php echo $result['img'];?>"/></td>
                      <td><?php echo $result['prefered_route'];?></td>
                      <td><?php echo $result['pick_up_point'];?></td>
                      <td>
                          <a class='btn'href="studntedit.php?editid=<?php echo $result['studentid'];?>">Edit</a>
                          <a class='btn' onclick="return confirm('Are you sure?')" href="?delid=<?php echo $result['studentid'];?>">Delete</a>
                      </td>
                  </tr>
              <?php } }?>
              </tbody>
          </table>
        <?php } ?>
      </form>
      </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>


