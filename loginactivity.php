<?php


/*define('DB_HOST', 'localhost');


define('DB_NAME', 'data');


define('DB_USER','root');


define('DB_PASSWORD','');



$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());


$db=mysqli_select_db($con,DB_NAME);*/


$con1= new mysqli("localhost","root","","licagents");
if($con1->connect_error){
	die("Connection failed".$con1->connect_error);
}
if(empty($_SESSION))//if the session not yet started 
   session_start();
   
   if(isset($_SESSION['agencycode'])) { // if already login
   header("location: menubuttons.php"); // send to home page
  exit; 
}

$agencycode=$_POST['agencycode'];


$password=$_POST['password'];



$query ="SELECT * FROM useragents where agencycode = '$agencycode' AND password = '$password'";

$data=mysqli_query($con1,$query);



$row = mysqli_fetch_array($data,MYSQLI_ASSOC);

if($row){
//echo "Welcome";

$_SESSION["agencycode"]=$agencycode;
$_SESSION["password"]=$password;
//$_SESSION["name"]=".$row['name'].";
	header('Location:menubuttons.php');

}
else {
echo "Invalid agency code or password";
}
?>