<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $student=new Student();
    $format=new Format();
    $userid=Session::get('id');
    $role=Session::get('role');
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['filter'])){
            $filter='1';
        }if(isset($_POST['aplyfilter'])){
             
           $studentList=$student->regStudentListFilter($_POST);
            if($studentList=='5'){
                $filList='0';
                $filter='1';//prevent redirrect to allstudents.php for empty input.
            }else{
                $filList='1';
            }
        }elseif(isset($_POST['all'])){
             echo "<script>window.location='studentslistReg.php'</script>";
        }
    }
?>
<?php
    if(isset($_GET['delid']) && $_GET['delid']!=NULL ){
    //filtering
    $delid=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delid']); 
     
     $delStudent=$student->delRegStuById($delid); 
  }
?>
<style>
    .btn{margin-top: 6px; font-size:16px; font-color: white;}

</style>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Registered Students</h2>
    <?php
        if(!isset($filter)){
    ?>
    <form action="" method="post">
        <input class='btn' type="submit" name="filter" class='medium' Value="Filter Students"/>
    </form>
    <?php }?>
    <div class="block">

        <?php 
          if(isset($delStudent) && !isset($_POST['filter'])){
            echo $delStudent;
          }
        ?>
      <form action="" method="post" enctype="multipart/form-data"> 
    <?php
        if(!isset($filter) || (isset($filList) && $filList=='1')){
    ?>    
        <table class="data display datatable" id="example">
          <thead>
          <tr>
              <th width='2%'>SL</th>
              <th width='14%'>Name</th>
              <th width='8%'>ID</th>
              <th width='6%'>DEPT</th>
              <th width='6%'>Email</th>
              <th width='5%'>Pass</th>
              <th width='2%'>Phone</th>
              <th width='8%'>DOB</th>
              <th width='4%'>SM</th>
              <th width='4%'>SC</th>
              <th width='4%'>Batch</th>
              <th width='4%'>RT</th>
              <th width='5%'>PUP</th>
              <th width='18%'>Action</th>
          </tr>
          </thead>
          <tbody>
    <?php
        $i=0;
        if(!isset($filList)){
            $students=$student->registeredStudentList();
        }elseif(isset($filList) && $filList =='1'){
            $students= $studentList;
        }
        if($students){
                while($result=$students->fetch_assoc()){
                    $i++;     
    ?>
            <tr class="odd gradeX">
              <td><?php echo $i;?></td>
              <td><?php echo $format->textShorten($result['studentName'], '15');?></td>
              <td><?php echo $result['studentid'];?></td>
              <td style='text-align: center;'><?php echo $result['dept'];?></td>

              <td><?php echo $format->textShorten($result['email'], '9');?></td>
              <td><?php echo $result['password'];?></td>
              <td><?php echo $format->textShorten($result['phone'], '7');?></td>
              <td><?php echo $result['dob'];?></td>
              <td style='text-align: center;'><?php echo $result['semester'];?></td>
              <td style='text-align: center;'><?php echo $result['section'];?></td>
              <td style='text-align: center;'><?php echo $result['batch'];?></td>
              <td style='text-align: center;'><?php echo $result['route'];?></td>
              <td><?php echo $result['pickuppoint'];?></td>
          <?php
              if($role=='StudentAdmin' || $userid=='1001'){?>
              <td>
                  <a class='btn' style="width: 55px; text-align:center;" href="studnteditReg.php?editid=<?php echo $result['studentid'];?>">Edit</a>
                  <a class='btn' onclick="return confirm('Are you sure?')" href="?delid=<?php echo $result['studentid'];?>">Delete</a>
              </td>
          <?php }else{ ?>
              <td style="text-align:center;">
                  <a class='btn' style="background-color: #ef4545" href="">Resticted</a>
              </td>
          <?php }?>

          </tr>
          <?php } }?>
          </tbody>
        </table>
        <?php }elseif((isset($filter) && $filter=='1') || (isset($filList) && $filList=='0')){?>
           <!--consider this div='block copyblock' bellow the class='block' div-->
      <div class="block copyblock">
      <!--pressed filter but empty-->
      <?php
        if(isset($filList) && $filList=='0'){
          echo "<span class='error'>Can not filter Data!</span>";
        }
      ?> 
        <table class="form"> 
            <tr>
                <tr>            
                <td>
                    <label>Student Name</label>
                </td>
                <td><input type='text' name="name" class='medium' placeholder="Student Name"></td>
            </tr>
            <tr>           
                <td>
                    <label>Student ID</label>
                </td>
                <td><input type='text' name="id" class='medium' placeholder="Student ID"></td>
            </tr>  
            <tr>
                <td>
                    <label>Depertment</label>
                </td>
                <td>
                    <select id="select" name="dept">
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
                    <input class='btn' type="submit" class='medium' name="aplyfilter" Value="Apply Filter" />
                    <input class='btn' type="submit" name="all" Value="Cancel" />
                </td>
            </tr>
        </table>
      </div>
          
    <?php }?>
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


