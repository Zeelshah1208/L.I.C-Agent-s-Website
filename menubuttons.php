<?php
$con1= new mysqli("localhost","root","","licagents");
if($con1->connect_error){
	die("Connection failed".$con1->connect_error);
}
if(empty($_SESSION)) // if the session not yet started 
   session_start();
if(!isset($_SESSION['agencycode'])) { //if not yet logged in
   header("Location: demo.html");// send to login page
   exit;
} 
?>
<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #111;
}
li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
.active{
	background-color: #3385ff;
}
.left{
	margin-left:0;
	margin-top:0;
	width:20%;
	height:587px;
	background-color:#004080;
	border: 5px solid #e6e6e6;
	float:left;
}
.right{
	background-color:white;
	height:587px;
	width:1050px;
	float:right;
	
}
.box{
	width:200px;
	height:50px;
	background-color:black;
	border: 3px solid white;
	text-align:center;
	font-family: Verdana,sans-serif;
	color:white;
	margin-left: 20px;
	margin-top: 20px;
	//padding: 5px;
	padding-top:20px;
}
.sp{
	margin-top:150px;
}
a{
	color:#4da6ff;
	text-decoration:none;
	
}
.iframe1{
	position:relative;
	//top:30px;
	//left:100px;
	//overflow-y:scroll;
	overflow-x:scroll;
}
</style>

</head>

<body bgcolor=#004080>
<ul>
  <li><a class="active" href="menubuttons.php">Home</a></li>
  <li class="dropdown"><a href="" class="dropbtn">Policies</a>
	<div class="dropdown-content">
		<a href="https://www.licindia.in/Products/Insurance-Plan/jeevan-rakshak" target="_blank">Jeeven Rakshak</a>
		<a href="https://www.licindia.in/Products/Insurance-Plan/anand" target="_blank">New Jeevan Anand</a>
		<a href="https://www.licindia.in/Products/Insurance-Plan/LIC-s-NEW-BIMA-BACHAT" target="_blank">New Bima Bachat</a>
		<a href="https://www.licindia.in/Products/Insurance-Plan/jeevan-anmol" target="_blank">Anmol Jeevan II</a>
	</div>
  </li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right;"><a href="logout.php">Logout</a></li>
</ul>
<div class="left">
<p style="color:white;font-size:20px; text-align:center; ">Welcome <?php echo $_SESSION['agencycode']; ?>!</p>
<div class="sp"></div>
<div class="box"> 
<a href="customermaster.php" target="b">Customer Master</a><br>
</div>
<div class="box"> 
<a href="transaction1.php" target="b">Transaction</a><br>
</div>
<div class="box"> 
 <a href="customerwise.php" target="b">Customerwise Report</a><br>
 </div>
 <div class="box"> 
 <a href="premiumdue.php" target="b">Premium Due Report</a><br>
 </div>
 </div>
 <div class="right">
 <iframe name="b"src="" height="587px" width="1060px" style="background-image: url('welcome.jpg');" ></iframe>
 </div>
 
 
</body>
</html>