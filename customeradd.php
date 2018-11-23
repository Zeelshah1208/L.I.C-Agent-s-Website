<?php

//define('DB_HOST', 'localhost');

//define('DB_NAME', 'data');

//define('DB_USER','root');

//define('DB_custid','');


//$con=mysqli_connect(DB_HOST,DB_USER,DB_custid) or die("Failed to connect to MySQL: " . mysql_error());

//$db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());


$con1= new mysqli("localhost","root","","licagents");
if($con1->connect_error){
	die("Connection failed".$con1->connect_error);
}
if(empty($_SESSION))//if the session not yet started 
   session_start();
 $flag=0;  
$agencycode=$_SESSION['agencycode'];   

$custid=$_POST['custid'];
if (preg_match("/^[a-zA-Z ]*$/",$_POST['custname']))
$custname=$_POST['custname'];
else {echo "invalid name";
$flag=1;}

$custgender=$_POST['custgender'];
if (preg_match("/^[0-9]{2}\/[0-9]{2}\/19[3-9]{1}[0-9]{1}$/",$_POST['custdob']))
$custdob=$_POST['custdob'];
else{
	echo "invalid dob";
	$flag=1;
}

$var=strtotime($custdob);
$var1=time();
$age=$var1-$var;
$age=round((((($age/60)/60)/24)/365));

$custage=$age;
$custoccupation=$_POST['custoccupation'];
$custaddress=$_POST['custaddress'];
$custcity=$_POST['custcity'];
$custcountry=$_POST['custcountry'];
$custpincode=$_POST['custpincode'];
if (preg_match("/^[0-9]{10}$/",$_POST['custcontactno']))
$custcontactno=$_POST['custcontactno'];
else{
	echo "invalid contact no";
	$flag=1;
}
if (filter_var($_POST['custemail'], FILTER_VALIDATE_EMAIL))
$custemail=$_POST['custemail'];
else{
	echo"invalid email";
	$flag=1;
}
$custbankname=$_POST['custbankname'];
$custaccno=$_POST['custaccno'];
$custmirccode=$_POST['custmirccode'];

if($flag!=1){
$sql="INSERT INTO customermaster(agencycode,custid,custname,custgender,custdob,custage,custoccupation,custaddress,custcity,custcountry,custpincode,custcontactno,custemail,custbankname,custaccno,custmirccode ) VALUES ('$agencycode','$custid','$custname','$custgender','$custdob','$custage','$custoccupation','$custaddress','$custcity','$custcountry','$custpincode','$custcontactno','$custemail','$custbankname','$custaccno','$custmirccode')";
if($con1->query($sql)===TRUE){
	//echo "recorded successfully.";
		//header('Location:demo.html');
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