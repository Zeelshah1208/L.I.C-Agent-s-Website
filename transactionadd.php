<?php

$con1= new mysqli("localhost","root","","licagents");
if($con1->connect_error){
	die("Connection failed".$con1->connect_error);
}
if(empty($_SESSION))//if the session not yet started 
   session_start();
$agencycode=$_SESSION['agencycode'];
$custid=$_POST['custid'];

$custname=$_POST['custname'];

$policyname=$_POST['policyname'];
$tablenumber=$_POST['tablenumber'];
$startingdate=$_POST['startingdate'];
$policynumber=$_POST['policynumber'];
$term=$_POST['term'];
$modeofpayment=$_POST['modeofpayment'];

$dateofmaturity=$_POST['dateofmaturity'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$medicaltest=$_POST['medicaltest'];


$qryAge = "select custage from customermaster where custid = $custid";
	$res = $con1->query($qryAge);
	$row = $res->fetch_assoc();
	$NewAge = $row['custage'];
	$qryPre = "select $modeofpayment from premiummaster where custage = $NewAge AND tablenumber = '$tablenumber'	";
	$res = $con1->query($qryPre);
	$row = $res->fetch_assoc();
	$mop = $row[$modeofpayment];
	$newPolicy = ($policynumber / 1000) * $mop;


$sql="INSERT INTO transaction(agencycode,custid,custname,policyname,tablenumber,startingdate,policynumber,term,modeofpayment,premiumamount,dateofmaturity,height,weight,medicaltest) VALUES ('$agencycode','$custid','$custname','$policyname','$tablenumber','$startingdate','$policynumber','$term','$modeofpayment','$newPolicy','$dateofmaturity','$height','$weight','$medicaltest')";
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

$con1->close();

?>