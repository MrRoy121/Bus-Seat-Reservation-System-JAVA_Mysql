 <?php
    include '../lib/Session.php';
    Session::checkSession();
?>
<?php
    include '../lib/Database.php';
    include '../helpers/Format.php';
    spl_autoload_register(function($class){
        include_once "../classes/".$class.".php";
    });
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
    $userid=Session::get('id');
    $role=Session::get('role');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layouts.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/lg2.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Seat Reservation and Tracking</h1>
					<a href="https://www.lus.ac.bd/">www.lus.ac.bd</a> 
				</div>
                <div class="floatright">
                    <div class='floatleft' style='margin: right: 5px;'>
                        <style>

                        #ct7{
                            background-color: #FFFF00;
                            font-size: 13px;
                            font-weight: bold;
                            color: black;
                            padding-left: 4px;
                            padding-right: 4px;
                            margin-right: 5px;
                        }
                        </style>
                         <script>function display_ct7() {
                        var x = new Date()
                        var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
                        hours = x.getHours( ) % 12;
                        hours = hours ? hours : 12;
                        hours=hours.toString().length==1? 0+hours.toString() : hours;

                        var minutes=x.getMinutes().toString()
                        minutes=minutes.length==1 ? 0+minutes : minutes;

                        var seconds=x.getSeconds().toString()
                        seconds=seconds.length==1 ? 0+seconds : seconds;

                        var month=(x.getMonth() +1).toString();
                        month=month.length==1 ? 0+month : month;

                        var dt=x.getDate().toString();
                        dt=dt.length==1 ? 0+dt : dt;

                        var x1=month + "/" + dt + "/" + x.getFullYear(); 
                        x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
                        document.getElementById('ct7').innerHTML = x1;
                        display_c7();
                         }
                         function display_c7(){
                        var refresh=1000; // Refresh rate in milli seconds
                        mytime=setTimeout('display_ct7()',refresh)
                        }
                        display_c7()
                        </script>
                        <span id='ct7'></span> 
                    </div>
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" />
                    </div>
                        <?php
                            if(isset($_GET['action']) && isset($_GET['action'])=='logout'){
                                Session::destroy();
                            }
                        ?>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li >Hello <span style="color: blue; font-style: italic;"><?php echo Session::get('username')?></span></li>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="dashboard.php"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href="profile.php"><span>User Profile</span></a></li>
                <li class="ic-form-style"><a href="changepassword.php"><span>Change Password</span></a></li>
         <?php
            if(Session::get('role')=='Admin' && Session::get('userid')=='1001'){ ?>
                <li class="ic-charts"><a href="adduser.php"><span>Add User</span></a></li> 
                <li class="ic-charts"><a href="userlist.php"><span>User List</span></a></li>
         <?php }else{?>
                <li class="ic-charts"><a href="userlist.php"><span>User List</span></a></li>
         <?php }?>
            </ul>
        </div>
        <div class="clear">
        </div>
    