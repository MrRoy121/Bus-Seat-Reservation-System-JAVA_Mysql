 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
 ?>
<?php
    $admin=new Admin();
    $userid=Session::get('id');
    $role=Session::get('role');
    if($role!='Admin'){ 
          echo "<script>window.location='dashboard.php';</script>";   
    }
?>
 <?php
	if(isset($_GET['deluser']) && $_GET['deluser']!='1001' && $userid=='1001'){
		$deluser=$_GET['deluser'];
	 	$deladmin=$admin->delAdmin($deluser);
	}
?>
<style>
	span .btn:hover{
		background-color: green;
	}
	.btn:hover{
		background-color: #d50000d9;
	}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>User List</h2>
        <div class="block"> 
        <?php
        	if(isset($deladmin)){
        		echo $deladmin;
        	}
        ?>       
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width= >ID</th>
					<th width= >Name</th>
					<th width= >User Name</th>
					<th width= >Email</th>
					<th width=>phone</th>
					<th width=>img</th>
					<th width=>hometown</th>
					<th width=>Current Address</th>
					<th width= >Role</th>
					<?php if($role=='Admin'){ ?>
					<th width='14%'=>Action</th>
				<?php }?>


				</tr>
			</thead>
			<tbody>
				<?php
					$admins=$admin->allAdmins();
					if($admins){
						$i=0;
						while($result= $admins->fetch_assoc()){
							$i++;
				?>
				<tr class="even gradeC">
					<td><?php  echo $result['id'];?></td>
					<td><?php echo $result['name'];?></td>
					<td><?php echo $result['username'];?></td>
					<td><?php echo $result['email'];?></td>
					<td><?php echo $result['phone'];?></td>
					<td><img src="<?php echo $result['img'];?>" style="height:35px; width: 50px"/></td>
					<td><?php echo $result['hometown'];?></td>
					<td><?php echo $result['curaddress'];?></td>
					<td><?php echo $result['role'];?></td>
					<!--<?php if($role=='Admin'){
						if(($result['id']=='1001') && $userid!='1001'){ ?>
						<td style=" text-align: center;">
							<a style="background-color: #d50000d9;" class='btn' href="">Resticted</a>
						</td>
					    <?php }elseif($userid=='1001'){ ?>
						<td style=" text-align: center;">
							<span><a class='btn' href="viewuser.php?adminid=<?php echo $result['id'];?>">View </a></span>
							<?php if($result['id']!='1001'){ ?>
							<a class='btn' href="?deluser=<?php echo $result['id'];?>">Delete </a> <?php }?>
						</td>
					<?php }else{ ?>
						<td style=" text-align: center;">
							<span><a class='btn' href="viewuser.php?adminid=<?php echo $result['id'];?>">View </a></span>
				 
						</td>
				    <?php } } ?>
				-->
					 <?php if($role=='Admin'){
						if(($result['id']=='1001') && $userid!='1001'){ ?>
						<td style=" text-align: center;">
							<a style="background-color: #d50000d9;" class='btn' href="">Resticted</a>
						</td>
					    <?php }else{ ?>
						<td style=" text-align: center;">
							<span><a class='btn' href="viewuser.php?adminid=<?php echo $result['id'];?>">View </a></span>
							<?php if($result['id']!='1001' && $userid=='1001'){ ?>
							<a class='btn' href="?deluser=<?php echo $result['id'];?>">Delete </a> <?php }?>
						</td>
					 
						 
				    <?php } } ?>
				</tr>
				 
			<?php }} ?>
			</tbody>
		</table>
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
<?php include 'inc/footer.php'; ?>  
         