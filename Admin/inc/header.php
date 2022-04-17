<?php
 $fonts = "verdana";
 $bgcolor = "#444";
 $fontcolor = "#fff";
?>

<!doctype html>
<html>
<head>
 <title>Registration</title>
 <style>
  body{font-family:<?php echo $fonts;?>}
  .phpcoding{width:100%; margin: 0 auto;
   background:<?php echo "#aab" ?>;}
  .headeroption{background:<?php echo $bgcolor; ?>;
   color:<?php echo $fontcolor; ?>;text-align:left;padding:40px;}
   
   .header_name{
	   text-align:center;
	    width: 600px;
	    margin-right: auto;
   }
   .header_name h2{
	   font-weight: bold;
	   font-size:40px;
	   width: 100%;
	   margin-top:30px;
	   text-align:center;
   }
   
   .footeroption{background:<?php echo $bgcolor; ?>;
   color:<?php echo $fontcolor; ?>;text-align:center;padding:20px;}
  .headeroption h2, .footeroption h2{style="float:left"font-size:24px}
  
  .maincontent{min-height:400px;padding:20px;font-size:18px}
  p{margin:0}
 input[type="text"]{width:238px;padding:5px;}
 select{font-size:18px;padding:2px 5px;width:250px;}
 .tblone{width:100%;border:1px solid #fff;margin:20px 0}
 .tblone td{padding:5px 10px;text-align:center;}
 table.tblone tr:nth-child(2n+1){background:#fff;height:30px;}
 table.tblone tr:nth-child(2n){background:#f1f1f1;height:30px;}
 #myform{width:400px;border:1px solid #fff;padding:10px;}
 .form{
    margin-left:400px;
    padding:10px 20px;
    font-size:20px;
  }
  .form input{
    height:40px;
    width:300px;
     border: 1px solid black;
         border-radius: 10px;
  }
  .form input:focus{
    background-color: lightblue;
  }
  
  .form input[type=submit]{
    height:40px;
    width:150px; 
  }
  .form input[type=reset]{
    height:40px;
    width:150px; 
  }
  .form input[type=reset]:focus{
    background-color: lightblue;
  }
  button{
    height:40px;
    width:150px;
    background-color:lightblue;
  }
  button a{
     color:black;
     text-decoration:none;
  }
  .btn{
    border: 1px solid #ddd;
    color: white;
    font-weight: bold;
    cursor: pointer;
    font-size: 20px;
    padding: 2px 10px;
    background-color: #F90;
  }
 </style>
</head>
<body>

<div class="phpcoding">
 <div class="headeroption">
         <div class="header_name"><h2><?php echo "Registration Here!"; ?></h2></div>
         
 </div>
 
  <section class="maincontent">