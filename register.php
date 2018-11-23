<?php

$con= mysqli_connect('localhost','root','') or die("not connected".mysql_error());
$db=mysqli_select_db($con,'licagents') or die("not connected".mysql_error());

$agencycode=$_GET['agencycode'];
$password=$_GET['password'];
$name=$_GET['name'];
$dob=$_GET['dob'];
$dateofagency=$_GET['dateofagency'];
$doid=$_GET['doid'];
$doname=$_GET['doname'];
$docontactno=$_GET['docontactno'];
$branchcode=$_GET['branchcode'];
$branchname=$_GET['branchname'];
$branchadd=$_GET['branchadd'];
$branchcity=$_GET['branchcity'];
$contactno=$_GET['contactno'];
$email=$_GET['email'];


$query="INSERT INTO useragents(agencycode,password,name,dob,dateofagency,doid,doname,docontactno,branchcode,branchname,branchadd,branchcity,contactno,email) VALUES('$agencycode', '$password', '$name', '$dob', '$dateofagency', '$doid', '$doname', '$docontactno', '$branchcode', '$branchname', '$branchadd', '$branchcity', '$contactno', '$email')";

$data= mysqli_query($con, $query);

if($data)
{
	echo "Your registration is complete..";
}

else
{
	echo "error";
}

?>