<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
                <li><a class="menuitem">Our Students</a>
                    <ul class="submenu">
                <?php
                    if($role=='StudentAdmin' || $role=='Admin' || $userid=='1001'){?>
                        <li><a href="studentadd.php">Add Student</a> </li>
                <?php }?>
                        <li><a href="studentslistReg.php">Registered Student</a> </li>
                        <li><a href="studentslistAll.php">All Students</a> </li>
                    </ul>
                </li>
               <li><a class="menuitem">Our Busses</a>
                    <ul class="submenu">
                <?php
                    if($role=='BusAdmin' || $userid=='1001' ||$role=='Admin' ){?>
                        <li><a href="busadd.php">Add Bus</a></li>
                <?php } ?>
                        <li><a href="buslist.php">Bus List</a></li>
                    </ul>
                </li>
				
                 <li><a class="menuitem">Bus Schedule</a>
                    <ul class="submenu">
                        <li><a a href="busavailable.php">Send Bus</a></li>
                        <li><a a href="busonroad.php">On Road</a></li>
                        <li><a a href="bushistory.php">Bus History</a></li>
                    </ul>
                </li>
				<li><a class="menuitem">Notice</a>
                    <ul class="submenu">
                        <li><a href="slideradd.php">Add Notice</a> </li>
                        <li><a href="sliderlist.php">Notice List</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>