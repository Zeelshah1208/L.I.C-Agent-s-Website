<?php

//define('DB_HOST', 'localhost');

//define('DB_NAME', 'data');

//define('DB_USER','root');

//define('DB_PASSWORD','');


//$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());

//$db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());


$con1= new mysqli("localhost","root","","licagents");
if($con1->connect_error){
	die("Connection failed".$con1->connect_error);
}
$flag=0;
if (preg_match("/^[0-9]{8}$/",$_POST['agencycode']))
$agencycode=$_POST['agencycode'];
else{
	$flag=1;
	echo"invalid agency code";
}

$password=$_POST['password'];
if (preg_match("/^[a-zA-Z ]*$/",$_POST['name']))
$name=$_POST['name'];
else{
	$flag=1;
	echo"invalid name";
}
$dob=$_POST['dob'];
$dateofagency=$_POST['dateofagency'];
$doid=$_POST['doid'];
$doname=$_POST['doname'];
if (preg_match("/^[0-9]{10}$/",$_POST['docontactno']))
$docontactno=$_POST['docontactno'];
else{
	$flag=1;
	echo"invalid contact no";
}
$branchcode=$_POST['branchcode'];
$branchname=$_POST['branchname'];
$branchadd=$_POST['branchadd'];
$branchcity=$_POST['branchcity'];
if (preg_match("/^[0-9]{10}$/",$_POST['contactno']))
$contactno=$_POST['contactno'];
else{
	$flag=1;
	echo"invalid contact no";
}
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
$email=$_POST['email'];
else{
	$flag=1;
	echo"invalid email id";
}

if($flag!=1){
$sql="INSERT INTO useragents(agencycode,password,name,dob,dateofagency,doid,doname,docontactno,branchcode,branchname,branchadd,branchcity,contactno,email) VALUES ('$agencycode','$password','$name','$dob','$dateofagency','$doid','$doname','$docontactno','$branchcode','$branchname','$branchadd','$branchcity','$contactno','$email')";
if($con1->query($sql)===TRUE){
	//echo "recorded successfully.";
		header('Location:demo.html');
		/*echo "<script type= 'text/javascript' >function f1(){
			alert("Successfully.");
		}</script>";*/
}
else{
	echo "Error".$sql."<br>".$con1->error;
}
}
$con1->close();

/*$data= mysqli_query($con,$query);

if($data)

	{
	
	echo "YOUR REGISTRATION IS COMPLETED...";

	}

else
{
echo "asdsad";
}
*/
?>