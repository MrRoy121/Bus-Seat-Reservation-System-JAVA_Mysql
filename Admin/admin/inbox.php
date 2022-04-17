<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
 <?php
	$filepath= realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/Cart.php');
	$ct=new Cart();
	$fm=new Format();
?>
 <?php 
    if(isset($_GET['confirmID'])){
        $confirmID=$_GET['confirmID'];
        $orderConfirm=$ct->confirmOrder($confirmID);
    }
 ?>
<?php 
    if(isset($_GET['cancelID'])){
        $cancelID=$_GET['cancelID'];
        $orderCancel=$ct->cancelOrder($cancelID);
    }
 ?>
 <?php
	if(isset($_GET['shiftID'])){
		$shiftID=$_GET['shiftID'];
		$orderShiped=$ct->productShifted($shiftID);
	}
?>
<?php
	if(isset($_GET['deliveredID'])){
		$deliveredID=$_GET['deliveredID'];
		$orderDelivered=$ct->productDelivered($deliveredID);
	}
?>
<?php 
    if(isset($_GET['deleteID'])){
        $deleteID=$_GET['deleteID'];
        $orderdelete=$ct->deleteOrder($deleteID);
    }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php
                	if(isset($orderConfirm)){
                		echo $orderConfirm;
                	}
                	if(isset($orderCancel)){
                		echo $orderCancel;
                	}
                	if(isset($orderShiped)){
                		echo $orderShiped;
                	}
                	if(isset($orderDelivered)){
                		echo $orderDelivered;
                	}
                	if(isset($orderdelete)){
                		echo $orderdelete;
                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Cus. ID</th>
							<th>Price</th>
							<th>Address</th>
							<th>Status</th>
							<th width="15%;">Action</th>


						</tr>
					</thead>
					<tbody>
						<?php
							$getorders=$ct->getOrders();
							if($getorders){
								while($result=$getorders->fetch_assoc()){ ?>
						<tr class="odd gradeX">
							<td><?php echo $result['orderID']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><?php echo$result['productName']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td><?php echo $result['customerID']; ?></td>
							<td>$<?php echo $result['price']?></td>
							<td><a href="customer.php?customerID=<?php echo $result['customerID']?>">View Details</a></td>
							<td>
						<style>
							.buysubmit{
								background: red   repeat scroll 0 0;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 5px; color: #fff;font-size: 1.1em; padding: 2px 7px; cursor: pointer; outline: none;
							}
						</style>
								<?php 
									if($result['status']=='0'){ ?>
									<a href="#"><span style='color: #a21d1d;'>Pending</span></a>
								<?php }elseif($result['status']=='1'){?>
									<a href="#"><span style='color: green;'>Confirmed </span></a>
								<?php }elseif($result['status']=='2'){ ?>
									<a style='color: red;' href="#">Order Cancelled</a>
								<?php }elseif($result['status']=='3'){ ?>
									<a style='color: Green;' href="#">Item Shiped</a>
								<?php }elseif($result['status']=='4'){ ?>
									<a href="#"><span style='color: green;'>Delivered</span></a>
									<?php } ?>
							</td>
							<td>
						<style>
							.buysubmit{
								background: red repeat scroll 0 0;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 5px; color: #fff;font-size: 1.1em; padding: 2px 7px; cursor: pointer; outline: none; width: 100px;
							}
						</style>
								<?php 
									if($result['status']=='0'){ ?>
									<a onclick="return confirm('Are You Sure To Confirm!');" href="?confirmID=<?php echo $result['orderID']?>"><span class='buysubmit'>Confirm</span></a>
									<a onclick="return confirm('Are You Sure To Cancel!');" href="?cancelID=<?php echo $result['orderID']?>"><span class='buysubmit'>Cancel</span></a>
								<?php }elseif($result['status']=='1'){?>
									<a onclick="return confirm('Are You Sure To Shiped!');" href="?shiftID=<?php echo $result['orderID']?>"><span style='background:green repeat scroll 0 0;' class="buysubmit">Shiped</span></a>
								<?php }elseif($result['status']=='2'){ ?>
									<a onclick="return confirm('Are You Sure To Delete!');" href="?deleteID=<?php echo $result['orderID']?>"><span class='buysubmit'>Delete</span></a>
								<?php }elseif($result['status']=='3'){ ?>
									 
									<a onclick="return confirm('Are You Sure To Deliver!');" href="?deliveredID=<?php echo $result['orderID']?>"><span style='background:green repeat scroll 0 0;' class='buysubmit'>Delivered</span></a>
								<?php }elseif($result['status']=='4'){ ?>
									<a onclick="return confirm('Are You Sure To Delete!');" href="?deleteID=<?php echo $result['orderID']?>"><span class='buysubmit'>Delete</span></a>
								<?php }else{ ?>
									<a href="#"><span style='font-weight: bold;'>N/A</span></a>
									<?php } ?>
							</td>
						</tr>
					<?php }}?>
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
<?php include 'inc/footer.php';?>